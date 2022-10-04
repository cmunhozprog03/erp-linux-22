<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategory extends FormRequest
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
        $url = $this->segment(3);
        return [
            'name' => "required|min:3|max:255|string|unique:categories,name,${url},url",
            'description' => 'nullable|min:3|max:2000',
            'picture' => 'nullable|image|max:2048|mimes:png,jpg,png,ico'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é de preenchimento obrogatório.',
            'min' => 'Este campo deve conter no mínimo 3 caracteres.',
            'name.max' => 'Este campo deve conter no máximo 255 caracteres.',
            'description.max' => 'Este campo deve conter no máximo 2000 caracteres.',
            'picture.image' => 'Envio somente de imagens nos formatos: jpeg, jpg, png, ico.',
            'pictura.max' => 'Imagens até 2MB'
        ];
    }
}
