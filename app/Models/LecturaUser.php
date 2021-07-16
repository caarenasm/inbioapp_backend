<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturaUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','tipo_lectura_id','datos_leidos'];
    protected $cast = ['datos_leido' => 'array'];
}
