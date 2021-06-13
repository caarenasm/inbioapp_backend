<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;

    protected $table = 'enfermedades';

    public function tiposEnfermedades(){
        return $this->belongsToMany('App\Models\TipoEnfermedad');
    }
}
