<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation = [
            "name" => "required|string|max:50|unique:categories,name"
        ];

        if($this->isMethod('put')) {
            $validation['id'] = 'required|int|min:1|max:999999|exists:categories,id';
            $validation['name'] = $validation['name'].",{$this->id}";
        }

        return $validation;
    }
}
