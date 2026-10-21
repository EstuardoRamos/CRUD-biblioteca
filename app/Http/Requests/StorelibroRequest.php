<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLibroRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            //
            'titulo'=> ['required', 'string', 'max:150'],
            'isbn' =>['nullable', 'digits:13', 'unique:libros,isbn'],
            //'anio_publicacion' => ['required', 'integer', 'between:1000'. now()->year],
            'paginas' => ['required', 'integer', 'min:1'],
            'anio_publicacion' => ['required', 'integer', 'min:1000', 'max:' . now()->year],
            'disponible'=>['boolean'],
            'autor_id'=>['required', 'exists:autores,id']

        ];
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
