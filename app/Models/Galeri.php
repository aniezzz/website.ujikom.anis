<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'kategori',
        'judul',
        'gambar',
        'tanggal',
        'likes',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'likes' => 'integer',
    ];
}