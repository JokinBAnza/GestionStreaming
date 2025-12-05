<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media_Genre extends Model
{
    public function genres() {
        return $this->belongsToMany(Genre::class, 'media_genres', 'media_id', 'genre_id');
    }
}
