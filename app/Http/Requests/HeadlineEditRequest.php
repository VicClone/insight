<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeadlineEditRequest extends FormRequest
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
            'title'          => 'required|max:250',
        ];
    }

    public function messages() {
        return [
            'title.required'         => 'Введите название',
            'title.max'              => 'Название должно состоять максимум из 250 символов',
        ];
    }
}
