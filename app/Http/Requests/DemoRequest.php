<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemoRequest extends FormRequest
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
            'name' => 'required|max:32',
            'textMessage' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Введите Ваше имя',
            'name.max' => 'Имя должно содержать не более 32 символов',
            'textMessage.required' => 'Введите комментарий'
        ];
    }
}
