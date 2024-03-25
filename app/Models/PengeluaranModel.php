<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranModel extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $guarded = ['id'];

    public function operasional()
    {
        return $this->belongsTo(OperasionalModel::class, 'id_operasional');
    }
}
