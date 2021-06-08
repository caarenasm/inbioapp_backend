<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRecetaRequest extends FormRequest
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
        $receta = $this->route()->parameter('receta');

        $rules = [
            'titulo' => 'required',
            'slug' => 'required|unique:recetas',
            'publicacion' => 'required|in:0,1'
        ];

        if ($receta) {
            $rules['slug'] = 'required|unique:recetas,slug,' . $receta->id;
        }

        if ($this->publicacion == 1) {
            $rules = array_merge($rules, [
                'seo_titulo' => 'required',
                'seo_descripcion' => 'required',
                'descripcion' => 'required',
                'preparacion' => 'required',
                'fecha_publicacion' => 'required',
                'caloria' => 'required',
                'grasa' => 'required',
                'proteina' => 'required',
            ]);
        }
        return $rules;
    }
}
