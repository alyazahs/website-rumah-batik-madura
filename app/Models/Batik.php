<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batik extends Model
{
    use HasFactory;

    protected $table = 'batiks'; 

    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'harga',
    ];
}
