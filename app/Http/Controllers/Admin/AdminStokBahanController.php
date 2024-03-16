<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
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
            'jumlah' => 'required|numeric|min:1'
        ]);

        DB::beginTransaction();

        try {
            $bahan = BahanModel::findOrFail($request->bahan);
            $stokSekarang = $request->jumlah * $bahan->bobot; // Konversi jumlah ke satuan yang ditetapkan

            // Tambahkan stok bahan
            $stokBahan = new StokBahanModel();
            $stokBahan->id_bahan = $bahan->id;
            $stokBahan->stok = $stokSekarang;
            $stokBahan->save();

            // Kurangi saldo
            $saldo = SaldoModel::findOrFail($request->saldo);
            $saldoSekarang = $bahan->harga * $request->jumlah; // Asumsikan harga sudah per unit
            $saldo->saldo -= $saldoSekarang;
            $saldo->save();

            DB::commit();

            // Redirect atau response sukses
            return redirect()->route('admin.stok.index')->with('success', 'Stok bahan baku berhasil ditambahkan dan saldo berhasil dikurangi.');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            throw $e;
            // return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
