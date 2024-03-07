<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanModel extends Model
{
    use HasFactory;
    protected $table = 'bahan';
    protected $guarded = 'id';
}
