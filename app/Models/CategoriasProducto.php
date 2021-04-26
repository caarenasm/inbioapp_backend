<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasProducto extends Model
{
    use HasFactory;

    public function productos (){
        return $this->belongsToMany(Productos::class);
    }
}
