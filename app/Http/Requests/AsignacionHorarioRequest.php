<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionHorarioRequest extends FormRequest
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
        'sala'=> 'integer|required|',
        'periodo'=> 'integer|required|',
        'fechainicio'=> 'required|date_format:Y-m-d',
        'fechafin'=> 'required|date_format:Y-m-d',
        'horario'=> 'integer|required|',
        'mesa'=> 'integer|required|',
        'usuario'=> 'integer|required',
        'monitor'=> 'required|exists:estudiantes,id',
        'asignatura'=> 'required',
        'estrategia'=> 'integer|required|',
        ];
    }
}
