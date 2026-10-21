<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class UpdatelibroRequest extends StoreLibroRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */


    protected function prepareForValidation(){
        $this->merge([
            'disponible'=>$this->boolean('disponible'),
        ]);
    }
    public function rules(): array
    {
        return array_merge( parent::rules(),[
            'isbn' =>[
                'nullable',
                'digits:13',
                Rule::unique('libros', 'isbn')->ignore($this->route('libro')),
            ]

        ]);
    }

   
    public function messages()
    {
        return [
            'titulo.required'=>'El tirulo es requerido',
            'titulo.max'=>'El titulo no puede pasr los 150 caracteres',
            'isbn.digits'=>'el ISBN  debe de tener exactamente los 13 digitos',
            'isbn.unique'=>'ya exite el ISBN',
            

        ];  
    }
}
