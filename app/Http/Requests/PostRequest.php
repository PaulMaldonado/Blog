<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation = [
            'title'       => 'required|string|max:150|unique:posts,title',
            'description' => 'required|string|max:255',
            'author'      => 'nullable|string|max:150',
            'category_id' => 'required|int|min:1|max:999999|exists:categories,id'
        ];

        if($this->isMethod('put')) {
            $validation['id']   = 'required|int|min:1|max:999999|exists:posts,id';
            $validation['title'] = $validation['title'].",{$this->id}";
        }

        return $validation;
    }
}
