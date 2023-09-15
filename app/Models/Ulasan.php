<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    protected $guarded = ['id'];
   
    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
