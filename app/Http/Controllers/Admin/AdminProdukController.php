<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.produk.index', ['produks' => ProdukModel::all()]);
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
        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required|string|unique:' . ProdukModel::class,
            'harga' => 'required|numeric',
        ]);
        try {
            // Simpan data ke database
            $bahanBaku = new ProdukModel();
            $bahanBaku->nama = $request->input('nama');
            $bahanBaku->harga_jual = $request->input('harga');
            $bahanBaku->save();

            // Redirect atau berikan respons yang sesuai
            alert()->success('Berhasil !', 'Data produk baru berhasil di simpan');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;

            // alert()->success('Berhasil !', 'Data bahan baku baru berhasil di simpan');
            alert()->error('Gagal !', 'Terjadi kesalahan di server');
            return redirect()->back();
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
