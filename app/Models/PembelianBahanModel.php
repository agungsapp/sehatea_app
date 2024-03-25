<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBahanModel extends Model
{
    use HasFactory;
    protected $table = 'pembelian_bahan';
    protected $guarded = ['id'];


    public function bahan()
    {
        return $this->belongsTo(BahanModel::class,  'id_bahan', 'id');
    }
}
