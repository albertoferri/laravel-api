<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'preview' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Inserisci Titolo!!',
            'title.max' => "Puoi usare al massimo :max caratteri",
            'preview.max' => "Peso limite 2048 KB",
            'preview.required' => 'E sforzati un pochinoo!!'
        ];
    }
}
