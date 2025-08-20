<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'Preencha o campo nome',
            'price.required' => 'Preencha o campo preço',
            'quantity.required' => 'Preencha o campo quantidade'
        ];
        
    }
}
