<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticulo extends FormRequest
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
        return [
            'nombre' => 'required|min:3|unique:articulos',
            'categoria_id' => 'min:1|numeric'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre del articulo es requerido',
            'nombre.min' => 'El nombre debe tener 3 letras minimo',
            'nombre.unique' => 'Ya existe un articulo con este nombre',
            'categoria_id.min' => 'Seleccione una categoria aceptable',
            'categoria_id.numeric' => 'Seleccione una categoria aceptable'
        ];
    }
}
