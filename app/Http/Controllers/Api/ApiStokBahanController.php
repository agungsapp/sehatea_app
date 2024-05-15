<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use App\Models\PembelianBahanModel;
use App\Models\SaldoModel;
use App\Models\StokBahanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiStokBahanController extends Controller
{
    public function create(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'bahan' => 'required|exists:bahan,id',
            'saldo' => 'required|exists:saldo,id',
            'jumlah' => 'required|numeric|min:1',
            'harga_input' => 'numeric|min:1'
        ]);

        DB::beginTransaction();
        try {
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
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui stok bahan baku atau mengurangi saldo.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
