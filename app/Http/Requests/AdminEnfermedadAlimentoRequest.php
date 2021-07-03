<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEnfermedadAlimentoRequest extends FormRequest
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
        $alimento_enfermedad = $this->route()->parameter('enfermedadAlimento');

        $rules = [
            // 'alimento_id' => 'required|unique:enfermedad_alimentos',
            'alimento_id' => 'required',
            'enfermedad_id' => 'required',
            'recomendacion' => 'required',
        ];

        // if ($alimento_enfermedad) {
        //     $rules['alimento_id'] = 'required|unique:enfermedad_alimentos,alimento_id,' . $alimento_enfermedad->id;
        // }

        return $rules;
    }
}
