<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAlimentosController extends Controller
{
    public function __invoke()
    {
        return view('livewire.admin.alimentos.alimentos');
    }
}
