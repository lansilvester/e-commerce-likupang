<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;
    
    protected $table = 'kuliner';
    protected $guarded = ['id'];

    public function avg_rating()
    {
        return $this->ulasan()->avg('rating');
    }

    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($kuliner) {
            $kuliner->ulasan()->delete();
        });
    }
    

}
