<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use App\Models\DetailTransaksiModel;
use App\Models\KomposisiModel;
use App\Models\PembelianBahanModel;
use App\Models\ProdukModel;
use App\Models\SaldoModel;
use App\Models\StokBahanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiTransaksiController extends Controller
{


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.produk_id' => 'required|integer|exists:produk,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $items = $validatedData['items'];

        DB::beginTransaction();

        try {
            // Cek stok bahan sebelum membuat transaksi
            foreach ($items as $item) {
                $komposisi = KomposisiModel::where('id_produk', $item['produk_id'])->get();
                foreach ($komposisi as $komponen) {
                    $stokBahan = StokBahanModel::where('id_bahan', $komponen->id_bahan)->first();
                    if (!$stokBahan || $stokBahan->stok < ($item['jumlah'] * $komponen->takaran)) {
                        DB::rollBack();
                        $getNamaProduk = ProdukModel::find($item['produk_id']);
                        return response()->json(['message' => 'Stok bahan tidak cukup untuk produk: ' . $getNamaProduk->nama], 400);
                    }
                }
            }

            // Inisialisasi transaksi setelah stok bahan mencukupi
            $transaksi = TransaksiModel::create([
                'id' => Str::uuid(),
                'total' => 0,
            ]);

            $totalTransaksi = 0;

            foreach ($items as $item) {
                $produk = ProdukModel::find($item['produk_id']);
                $subtotal = $item['jumlah'] * $produk->harga_jual;
                $totalTransaksi += $subtotal;

                DetailTransaksiModel::create([
                    'id_transaksi' => $transaksi->id,
                    'id_produk' => $item['produk_id'],
                    'harga_satuan' => $produk->harga_jual,
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $subtotal,
                ]);

                // Kurangi stok bahan
                $komposisi = KomposisiModel::where('id_produk', $item['produk_id'])->get();
                foreach ($komposisi as $komponen) {
                    $stokBahan = StokBahanModel::where('id_bahan', $komponen->id_bahan)->first();
                    $stokBahan->stok -= $item['jumlah'] * $komponen->takaran;
                    $stokBahan->save();
                }
            }

            $transaksi->total = $totalTransaksi;
            $transaksi->save();

            DB::commit();

            $transaksi = TransaksiModel::with('detail.produk')->find($transaksi->id);

            return response()->json([
                'message' => 'Transaksi berhasil disimpan',
                'transaksi' => $transaksi
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Gagal menyimpan transaksi', 'error' => $e->getMessage()], 500);
        }
    }

    public function createStok(Request $request)
    {
        try {
            $validated = $request->validate([
                'bahan' => 'required|exists:bahan,id',
                'saldo' => 'required|exists:saldo,id',
                'jumlah' => 'required|numeric|min:1',
                'harga_input' => 'nullable|numeric|min:1'
            ]);

            DB::beginTransaction();

            $bahan = BahanModel::findOrFail($request->bahan);
            $stokSekarang = $request->jumlah * $bahan->bobot;

            $stokBahan = StokBahanModel::where('id_bahan', $request->bahan)->first();
            if ($stokBahan) {
                $stokBahan->stok += $stokSekarang;
                $stokBahan->save();
            } else {
                $buatStokBaru = new StokBahanModel();
                $buatStokBaru->id_bahan = $request->bahan;
                $buatStokBaru->stok = $stokSekarang;
                $buatStokBaru->save();
            }

            $saldo = SaldoModel::findOrFail($request->saldo);
            $harga = $request->harga_input ?: $bahan->harga;
            $saldoSekarang = $harga * $request->jumlah;
            $saldo->saldo -= $saldoSekarang;
            $saldo->save();

            PembelianBahanModel::create([
                'id_bahan' => $request->bahan,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $harga,
                'total' => $harga * $request->jumlah,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Stok bahan baku berhasil diperbarui/ditambahkan dan saldo berhasil dikurangi.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            if ($e instanceof RedirectResponse) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi pengalihan (redirect).',
                    'redirect_url' => $e->getTargetUrl(),
                ], 500);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ], 500);
            }
        }
    }
}
