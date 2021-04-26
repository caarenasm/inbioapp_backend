<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminEscritorioController extends Controller
{
    public function __invoke()
    {

        $administradores = User::role(['Administrador'])->count();
        $editores = User::role(['Editor'])->count();
        $clientes = User::role(['Cliente'])->count();

        return view('livewire.admin.escritorio.index', ['admins' => $administradores, 'editors' => $editores, 'clients' => $clientes]);
    }
}
