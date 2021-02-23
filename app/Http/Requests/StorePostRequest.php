<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        return[
            'date'          => 'required|date',
            'name'          => 'required',
            'status'        => 'required|in:1,2',
            'slug'          => 'nullable',
            //'categories'    => 'required',
            //'tags'          => 'required',
            'extract'       => 'required',
            'body'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required'         => 'El campo Fecha de publicación es obligatoria',
            'date.date'             => 'El campo Fecha no es válido',
            'categories.required'   => 'Deberá seleccionar al menos una categoría',
            'tags.required'         => 'Deberá seleccioanr al menos un Tag',
            'name.required'         => 'El campo Titulo es obligatorio',
            'status.required'       => 'El campo Status es obligatorio',
            'extract.required'      => 'El Campo Extract es obligatorio',
            'body.required'         => 'El Campo Body es obligatorio',
            'name.unique'           => 'El campo Título ya existe en nuestra base de datos, debe ser único',
        ];
    }
}
