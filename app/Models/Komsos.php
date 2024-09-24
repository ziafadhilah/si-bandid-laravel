<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komsos extends Model
{
    use HasFactory;
    protected $table = 'komsoss'; // Nama tabel disesuaikan
    protected $fillable = ['sas', 'tanggal', 'dokumen']; // Kolom yang bisa diisi
}