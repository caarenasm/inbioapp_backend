<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CrearEnfermedadAlimento extends Component
{
    public function render()
    {
        return view('livewire.crear-enfermedad-alimento');
    }

    // public $selectedCategoria = null, $selectedAlimento = null;

    // public $almentos = null;

    // public function render()
    // {
    //     return view('livewire.crear-enfermedad-alimento',[
    //         'categorias' => CategoriaAlimento::all(),
    //     ]);
    // }

    // public function updatedselectedCategoria($categoria_id)
    // {
    //     $this->alimentos = Alimento::where('categoria_alimento_id',$categoria_id)->get();
    // }
}
