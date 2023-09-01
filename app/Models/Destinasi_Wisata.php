<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi_Wisata extends Model
{
    use HasFactory;
    
    protected $table = 'destinasi_wisata';
    protected $fillable = [
        'nama_destinasi',
        'alamat',
        'map',
        'harga_masuk',
        'deskripsi',
        'foto',
        'kontak'
    ];
    
}
