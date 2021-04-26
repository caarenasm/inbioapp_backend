<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBlogRequest extends FormRequest
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
        $post = $this->route()->parameter('blog');

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'published' => 'required|in:0,1',
            'author' => 'required',
            'imagen' => 'image'
        ];

        if ($post) {
            $rules['slug'] = 'required|unique:blogs,slug,' . $post->id;
        }

        if ($this->published == 1) {
            $rules = array_merge($rules, [
                'seo_title' => 'required',
                'seo_description' => 'required',
                'text' => 'required',
                'start_date' => 'required'
            ]);
        }
        return $rules;
    }
}
