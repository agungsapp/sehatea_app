<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomposisiModel extends Model
{
    use HasFactory;
    protected $table = 'komposisi';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id');
    }
    public function bahan()
    {
        return $this->belongsTo(BahanModel::class, 'id_bahan', 'id');
    }
}
