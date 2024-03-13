<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanModel;
use App\Models\KomposisiModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class AdminKomposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'komposisis' => KomposisiModel::all(),
            'produks' => ProdukModel::all(),
            'bahans' => BahanModel::all()
        ];

        // dd($data['komposisis']);


        return view('admin.komposisi.index', $data);
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
            'produk' => 'required',
            'bahan' => 'required',
            'takaran' => 'required|numeric',
        ]);


        $id_bahan = $request->input('bahan');
        $bahan = BahanModel::find($id_bahan);
        // dd($bahan);
        $total = $bahan->harga_satuan *  $request->input('takaran');



        try {

            // Update hpp
            $produk = ProdukModel::find($request->produk);

            // Simpan data ke database
            $komposisi = new KomposisiModel();
            $komposisi->id_produk = $request->input('produk');
            $komposisi->id_bahan = $request->input('bahan');
            $komposisi->takaran = $request->input('takaran');
            $komposisi->total_harga = $total;
            $komposisi->save();

            // Update total_harga pada ProdukModel
            $totalHargaKomposisi = KomposisiModel::where('id_produk', $produk->id)->sum('total_harga');
            $produk->hpp = $totalHargaKomposisi;
            $produk->save();

            // Redirect atau berikan respons yang sesuai
            alert()->success('Berhasil !', 'Data komposisi berhasil di simpan');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;

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
