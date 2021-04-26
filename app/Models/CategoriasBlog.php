<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasBlog extends Model
{
    use HasFactory;

    public function entradas (){
        return $this->belongsToMany(Blog::class);
    }
}
