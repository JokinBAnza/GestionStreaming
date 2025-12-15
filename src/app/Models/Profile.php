<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nombre',
        'edad',
        'sexo',
        'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
