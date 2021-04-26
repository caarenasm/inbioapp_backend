<?php

namespace App\Http\Controllers;

use App\Models\Paises;
use Illuminate\Http\Request;

class AdminEnvioPaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pais = new Paises();
        $paises = Paises::orderBy('nombre', 'ASC')->get();
        return view('livewire.admin.envios.paises-index', ['paises'=>$paises, 'pais' => $pais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:paises'
        ]);
        $pais = new Paises();
        $pais->nombre = $request->nombre;
        $pais->save();
        return redirect()->route('envio-pais');
    }

    /**
     * Display the specified resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paises $pais)
    {
        $paises = Paises::orderBy('nombre', 'ASC')->get();
        return view('livewire.admin.envios.paises-index', ['paises'=>$paises, 'pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paises $pais)
    {
        $request->validate([
            'nombre' => 'required|unique:paises,nombre,'.$pais->id
        ]);
        $pais->nombre = $request->nombre;
        $pais->save();
        return redirect()->route('envio-pais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paises::destroy($id);
        return redirect()->route('envio-pais');
    }
}
