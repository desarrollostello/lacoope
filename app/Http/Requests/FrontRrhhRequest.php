<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontRrhhRequest extends FormRequest
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

        $rrhh = $this->route()->parameter('rrhh');

        switch ($this->method()) 
        {
            case 'GET':
            case 'DELETE': 
            {
                return [];
            }
            case 'POST': 
            {
                return [
                    'nombre'      => 'required',
                    'telefono'    => 'required',
                    'email'       => 'required|email',
                    'file'        => 'required|file',
                    'slug'        => 'nullable'
                ];
            }
            case 'PUT':
            case 'PATCH': 
            {
                return 
                [
                    'nombre'      => 'required',
                    'telefono'    => 'required',
                    'email'       => 'required|email',
                    'file'        => 'nullable|file',
                    //'slug'        => 'nullable|unique:rrhhs,slug,' . $rrhh->id
                ];
            }
            
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'nombre.required'    => 'El campo Nombre es obligatoria',
            'telefono.required'  => 'El campo Teléfono es obligatorio',
            'email.required'     => 'El Campo Email es obligatorio',
            'email.email'        => 'Deberá colocar un email válido',
            'file.required'      => 'El campo Archivo es obligatorio',
        ];
    }
}
