<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagazineRequest extends FormRequest
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
            'name'      => 'max:250',
            'number'    => 'required|max:250',
            'year'      => 'required|max:4',
            'cover'     => 'required',
            'file'      => 'required',
            'sort'      => ''
        ];
    }

    public function messages() {
        return [
            'name.required'     => 'Введите название',
            'name.max'          => 'Название должно состоять максимум из 250 символов',
            'number.required'   => 'Введите номер',
            'number.max'        => 'Номер должен быть максимум из 250 символов',
            'year.required'     => 'Введите год',
            'year.max'          => 'Год должен состоять из 4 симоволов',
            'cover.required'    => 'Добавьте обложку',
            'file.required'     => 'Добавьте файл',
        ];
    }
}
