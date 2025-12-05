<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
     protected $fillable = [
        'nombre',
    ];
    
    public function medias() {
    return $this->belongsToMany(Media::class, 'media_genres', 'genre_id', 'media_id');
}

}
