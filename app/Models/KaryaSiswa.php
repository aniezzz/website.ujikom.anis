<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaryaSiswa extends Model
{
    protected $fillable = ['jurusan', 'nama', 'gambar', 'deskripsi', 'info_tambahan'];
}