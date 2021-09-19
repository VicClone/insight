<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamEditRequest extends FormRequest
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
            'name'      => 'required|max:250',
            'position'  => 'required|max:250',
            'sort'      => '',
            'link'      => 'required|max:250',
        ];
    }

    public function messages() {
        return [
            'name.required'         => 'Введите имя',
            'name.max'              => 'Имя должно состоять максимум из 250 символов',
            'position.required'     => 'Введите должность',
            'position.max'          => 'Выберите компанию',
            'link.required'         => 'Введите ссылку',
            'link.max'              => 'Ссылка должно состоять максимум из 250 символов',
        ];
    }
}
