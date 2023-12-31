<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi_Wisata extends Model
{
    use HasFactory;
    
    protected $table = 'destinasi_wisata';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ulasan(){
        return $this->hasMany(UlasanDestinasi::class);
    }
    
}
