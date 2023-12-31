<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;
    
    protected $table = 'souvenir';
    protected $guarded = ['id'];
    
    public function user()
{
    return $this->belongsTo(User::class);
}

}
