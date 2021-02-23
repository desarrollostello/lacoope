<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopupRequest extends FormRequest
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
        $popup = $this->route()->parameter('popup');

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
                    'start_date'    => 'required|after_or_equal:' . $todayDate,
                    'end_date'      => 'required|after_or_equal:' . $todayDate,
                    'name'          => 'required|min:4|max:200',
                    'status'        => 'required|in:1,2',
                    'slug'          => 'nullable',
                    'title'         => 'nullable',
                    'text'          => 'nullable',
                    'visualizations'=> 'nullable',
                    'url'           => 'nullable',
                    'file'          => 'image'

                ];
            }
            case 'PUT':
            case 'PATCH': 
            {
                return 
                [
                    'start_date'    => 'required|after_or_equal:' . $todayDate,
                    'end_date'      => 'required|after_or_equal:' . $todayDate,
                    'name'          => 'required|min:4|max:200',
                    'status'        => 'required|in:1,2',
                    'title'         => 'nullable',
                    'text'          => 'nullable',
                    'visualizations'=> 'nullable',
                    'url'           => 'nullable',
                    'file'          => 'image',
                    'slug'          => 'nullable|unique:lineas_creditos,slug,' . $popup->id
                ];
            }
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'start_date.required'       => 'El campo Fecha de inicio es obligatoria',
            'end_date.required'         => 'El campo Fecha de finalización es obligatoria',
            'start_date.after_or_equal' => 'El campo Fecha de inicio debe ser una fecha mayor o igual al día de hoy',
            'end_date.after_or_equal'   => 'El campo Fecha de finalización debe ser una fecha mayor o igual al día de hoy',
            'name.required'             => 'El campo Nombre es obligatorio',
            'status.required'           => 'El campo Status es obligatorio',
        ];
    }
}
