<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
protected $fillable = [
    'kategori',
    'judul',
    'penulis',
    'tanggal',
    'ringkasan',
    'isi',
    'gambar',
    'is_featured',
    'views'
];

    protected $casts = [
        'gambar' => 'array',
        'tanggal' => 'date',
        'is_featured' => 'boolean',
    ];
}