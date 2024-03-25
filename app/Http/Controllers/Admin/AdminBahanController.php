<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use Illuminate\Http\Request;

class AdminBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.bahan.index', ['bahans' => BahanModel::all()]);
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
            'nama' => 'required|string|unique:' . BahanModel::class,
            'harga' => 'required|numeric',
            'bobot' => 'required|numeric',
            'satuan' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        try {

            // Simpan data ke database
            $bahanBaku = new BahanModel();
            $bahanBaku->nama = $request->input('nama');
            $bahanBaku->harga = $request->input('harga');
            $bahanBaku->bobot = $request->input('bobot');
            $bahanBaku->satuan = $request->input('satuan');
            $bahanBaku->harga_satuan = $request->input('harga_satuan');
            $bahanBaku->save();

            // Redirect atau berikan respons yang sesuai
            alert()->success('Berhasil !', 'Data bahan baku baru berhasil di simpan');
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
