<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use App\Models\DetailTransaksiModel;
use App\Models\KomposisiModel;
use App\Models\ProdukModel;
use App\Models\StokBahanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'bahans' => BahanModel::all(),
            'produks' => ProdukModel::all(),
        ];

        return view('admin.penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->qty as $idProduk => $jumlah) {
                if ($jumlah > 0) {
                    $komposisi = KomposisiModel::where('id_produk', $idProduk)->get();
                    foreach ($komposisi as $item) {
                        $stokBahan = StokBahanModel::where('id_bahan', $item->id_bahan)->first();
                        if (!$stokBahan || $stokBahan->stok < ($jumlah * $item->takaran)) {
                            // Jika stok tidak mencukupi
                            DB::rollBack();
                            alert()->error('Error', 'Stok bahan tidak cukup untuk produk: ' . $idProduk);
                            return redirect()->back();
                        }
                    }
                }
            }



            // Inisialisasi transaksi
            $transaksi = new TransaksiModel();
            $transaksi->id = Str::uuid();
            $transaksi->total = 0; // Inisialisasi total transaksi
            $transaksi->save();

            $totalTransaksi = 0;

            foreach ($request->qty as $idProduk => $jumlah) {
                if ($jumlah > 0) {
                    $produk = ProdukModel::find($idProduk);

                    // Cek apakah produk ditemukan
                    if (!$produk) {
                        DB::rollBack();
                        alert()->error('Error', 'Produk dengan ID: ' . $idProduk . ' tidak ditemukan.');
                        return redirect()->back();
                    }

                    $subtotal = $jumlah * $produk->harga_jual;
                    $totalTransaksi += $subtotal;

                    // Simpan detail transaksi
                    $detailTransaksi = new DetailTransaksiModel();
                    $detailTransaksi->id_transaksi = $transaksi->id;
                    $detailTransaksi->id_produk = $idProduk;
                    $detailTransaksi->harga_satuan = $produk->harga_jual;
                    $detailTransaksi->jumlah = $jumlah;
                    $detailTransaksi->subtotal = $subtotal;
                    $detailTransaksi->save();

                    // Mengurangi stok bahan
                    $komposisi = KomposisiModel::where('id_produk', $idProduk)->get();
                    foreach ($komposisi as $item) {
                        $stokBahan = StokBahanModel::where('id_bahan', $item->id_bahan)->first();
                        if ($stokBahan) {
                            $stokBahan->stok -= $jumlah * $item->takaran;
                            $stokBahan->save();
                        }
                    }
                }
            }

            // Update total transaksi
            $transaksi->total = $totalTransaksi;
            $transaksi->save();


            DB::commit();
            alert()->success('Berhasil !', 'Transaksi disimpan.');
            return redirect()->route('admin.transaksi.penjualan.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            alert()->error('Error', 'Terjadi kesalahan saat menyimpan transaksi.');
            return redirect()->back()->withErrors('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
