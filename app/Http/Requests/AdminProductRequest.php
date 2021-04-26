<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
        $product = $this->route()->parameter('producto');

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:productos',
            'published' => 'required|in:0,1'
        ];

        if ($product) {
            $rules['slug'] = 'required|unique:productos,slug,' . $product->id;
        }

        if ($this->published == 1) {
            $rules = array_merge($rules, [
                'seo_title' => 'required',
                'seo_description' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'weight' => 'required|numeric'
            ]);
        }
        return $rules;
    }
}
