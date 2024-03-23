<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use App\Models\PembelianBahanModel;
use App\Models\SaldoModel;
use App\Models\StokBahanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStokBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('ok');

        $data = [
            'bahans' => BahanModel::all(),
            'danas' => SaldoModel::all(),
            'stoks' => StokBahanModel::all()
            // 'bahans'
        ];

        // dd($data);

        return view('admin.stok_bahan.index', $data);
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
        $validated = $request->validate([
            'bahan' => 'required|exists:bahan,id',
            'saldo' => 'required|exists:saldo,id',
            'jumlah' => 'required|numeric|min:1',
            'harga_input' => 'numeric|min:1'
        ]);

        DB::beginTransaction();

        try {
            $bahan = BahanModel::findOrFail($request->bahan);
            $stokSekarang = $request->jumlah * $bahan->bobot; // Konversi jumlah ke satuan yang ditetapkan

            // Cek dan update atau buat stok bahan baru
            $stokBahan = StokBahanModel::find($request->bahan);
            if ($stokBahan) {
                $stokBahan->stok += $stokSekarang;
                $stokBahan->save();
            } else {
                $buatStokBaru = new StokBahanModel();
                $buatStokBaru->id_bahan = $request->bahan;
                $buatStokBaru->stok = $stokSekarang;
                $buatStokBaru->save();
            }

            // Jika stok ditemukan atau baru dibuat, update jumlah stoknya dan harga satuan jika diperlukan

            // Kurangi saldo
            $saldo = SaldoModel::findOrFail($request->saldo);
            $harga = $request->harga_input ?: $bahan->harga;
            $saldoSekarang = $harga * $request->jumlah;
            $saldo->saldo -= $saldoSekarang;
            $saldo->save();

            // Pembuatan catatan histori transaksi
            PembelianBahanModel::create([
                'id_bahan' => $request->bahan,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $harga,
                'total' => $harga * $request->jumlah,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Stok bahan baku berhasil diperbarui/ditambahkan dan saldo berhasil dikurangi.');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            throw $e;
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
