<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ApiProdukController extends Controller
{


    public function getProduk()
    {

        $produk = ProdukModel::all();

        return response()->json($produk, 200);
    }
}
