<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public function categorias (){
        return $this->belongsToMany(CategoriasProducto::class);
    }

    public function imagenes (){
        return $this->hasMany(Imagenes::class, 'product_id');
    }

}
