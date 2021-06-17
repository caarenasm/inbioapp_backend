<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadAlimento extends Model
{
    use HasFactory;

    public function enferemedad()
    {
        return $this->belongsTo(Enfermedad::class);
    }

    public function alimento()
    {
        return $this->hasMany(Alimento::class);
    }
}
