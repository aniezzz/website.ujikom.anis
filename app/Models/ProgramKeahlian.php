<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $fillable = [
        'kategori',
        'nama',
        'gambar',
        'deskripsi',
        'kompetensi',
        'prospek_karir',
    ];

    protected $casts = [
        'kompetensi' => 'array',
        'prospek_karir' => 'array',
    ];
}