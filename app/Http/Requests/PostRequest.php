<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //$post = $this->route('post');
        $post = $this->route()->parameter('post');

        $todayDate = date('d-m-Y');
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
                    'published'     => 'required|before_or_equal:' . $todayDate,
                    'name'          => 'required|min:4|max:200',
                    'status'        => 'required|in:1,2',
                    'slug'          => 'nullable',
                    'categories'    => 'required',
                    'tags'          => 'required',
                    'extract'       => 'required',
                    'body'          => 'required',
                    'file'          => 'image'

                ];
            }
            case 'PUT':
            case 'PATCH': 
            {
                return 
                [
                    'published'     => 'required|before_or_equal:' . $todayDate,
                    'name'          => 'required|min:4|max:200',
                    'status'        => 'required|in:1,2',
                    'categories'    => 'required',
                    'tags'          => 'required',
                    'extract'       => 'required',
                    'body'          => 'required',
                    'file'          => 'image',
                    'slug'          => 'nullable|unique:lineas_creditos,slug,' . $post->id
                ];
            }
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'published.required'    => 'El campo Fecha de publicación es obligatoria',
            'published.before_or_equal' => 'El campo Fecha de publicación debe ser una fecha menor o igual al día de hoy',
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
