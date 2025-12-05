<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
     protected $fillable = [
        'titulo',
        'formato',
        'genero',
        'director',
        'estreno',
    ];
    public function director()
{
    return $this->belongsTo(Director::class);
}
}
