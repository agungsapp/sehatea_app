<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;

    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'id_transaksi');
    }
}
