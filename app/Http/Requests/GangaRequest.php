<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GangaRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required|min:25',
            'category' => 'required',
            'price' => 'required',
            'price_sale' => 'required',
            'url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El titulo requiere al menos 5 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'description.min' => 'La descripción, requiere al menos 50 caracteres',
            'category.required' => 'La categoría es obligatoria',
            'price.required' => 'El precio es obligatoria',
            'price_sale.required' => 'El precio ganga es obligatoria',
            'url.required' => 'La dirección es obligatoria',
        ];
    }
}
