<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPlanRequest extends FormRequest
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
        $plan = $this->route()->parameter('plan');

        $rules = [
            'titulo' => 'required',
            'slug' => 'required|unique:plans',
            'descripcion' => 'required',
            'precio' => 'required'
        ];

        if ($plan) {
            $rules['slug'] = 'required|unique:plans,slug,' . $plan->id;
        }

        return $rules;
    }
}
