<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    public function envios (){
        return $this->hasMany(Envios::class, 'pais_id');
    }
}
