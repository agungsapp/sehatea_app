<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
