<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEnfermedad extends Model
{
    use HasFactory;

    protected $table = 'tipo_enfermedades';

    public function enfermedades(){
        return $this->belongsToMany('App\Models\Enfermedad');
    }
}
