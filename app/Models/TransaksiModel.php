<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_transaksi');
    }
}
