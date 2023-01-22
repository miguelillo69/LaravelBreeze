<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'desc' => 'required|min:25',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El título es obligatorio',
            'name.min' => 'El titulo requiere al menos 5 caracteres',
            'desc.required' => 'La descripción es obligatoria',
            'desc.min' => 'La descripción, requiere al menos 50 caracteres',
        ];
    }
}
