<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCrearAlimentosController extends Controller
{
    public function __invoke()
    {
        return view('livewire.admin.alimentos.crear-alimentos');
    }
}
