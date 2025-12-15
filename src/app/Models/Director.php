<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
     protected $fillable = [
        'nombre',
        'anoNacimiento',
    ];

public function medias()
{
    return $this->hasMany(Media::class, 'director'); // 'director' es la columna en media
}

}
