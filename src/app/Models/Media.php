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
        'director',
        'estreno',
    ];
    public function directorRel()
{
    return $this->belongsTo(Director::class, 'director'); // 'director' es el nombre de la columna
}


public function genres() {
    return $this->belongsToMany(Genre::class, 'media_genres', 'media_id', 'genre_id');
}
public function usuarios()
{
    return $this->belongsToMany(User::class, 'mi_listas');
}


}
