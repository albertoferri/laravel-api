<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required|max:8000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Inserisci Titolo!!',
            'title.max' => "Puoi usare al massimo :max caratteri",
            'description.required' => 'Facci capire almeno cosa sia!!',
            'description.max' => "Puoi usare al massimo :max caratteri",
        ];
    }
}
