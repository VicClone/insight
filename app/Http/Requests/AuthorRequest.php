<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'  => 'required|max:250',
            'sort'  => 'required',
            'image'  => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required'         => 'Введите имя',
            'sort.required'         => 'Введите позицию',
            'name.max'              => 'Имя должно состоять максимум из 250 символов',
            'image.required'         => 'Добавьте фото',
        ];
    }
}
