<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomposisiModel extends Model
{
    use HasFactory;
    protected $table = 'komposisi';
    protected $guarded = ['id'];
}
