<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'magazine-id'   => 'required',
            'name'          => 'required|max:250',
            'doi-link'      => 'required|max:250',
            'annotation'    => 'required',
            'file'          => 'required',
            'headline-id'   => 'required'
        ];
    }

    public function messages() {
        return [
            'magazine-id.required'  => 'Выберите журнал',
            'name.required'         => 'Введите имя',
            'name.max'              => 'Название должно состоять максимум из 250 символов',
            'doi-link.required'     => 'Введите ссылку',
            'doi-link.max'          => 'Ссылка должена быть максимум 250 символов',
            'annotation.required'   => 'Введите аннотацию',
            'file.required'         => 'Добавьте файл',
            'headline-id.required'  => 'Выберете раздел'
        ];
    }
}
