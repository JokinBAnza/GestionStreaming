<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'alias',
        'edad',
        'sexo',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
