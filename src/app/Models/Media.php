<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
     use HasFactory;

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
public function genres() {
    return $this->belongsToMany(Genre::class, 'media_genres', 'media_id', 'genre_id');
}

}
