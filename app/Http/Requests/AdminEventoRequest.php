<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $evento = $this->route()->parameter('evento');
        
        $rules = [
            'titulo' => 'required',
            'slug' => 'required|unique:eventos',
            'descripcion' => 'required',
            'fecha_evento' => 'required',
            'hora' => 'required',
            'tipo_evento_id' => 'required'
        ];

        if ($evento) {
            $rules['slug'] = 'required|unique:eventos,slug,' . $evento->id;
        }
        
        return $rules;
    }
}
