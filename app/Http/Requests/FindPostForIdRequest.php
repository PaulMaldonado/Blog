<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindPostForIdRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|int|min:1|max:99999|exists:posts,id',
        ];
    }
}
