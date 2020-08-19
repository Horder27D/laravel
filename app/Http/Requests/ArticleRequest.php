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
            'title' => 'required',
            'discription' => 'required'
        ];
    }

    public function attributes() {
        return [
            'title' => 'заголовок',
            'discription' => 'текст'
        ];
    }
    
    public function messages() {
        return [
            'title.required' => 'Поле заголовок является обязательным',
            'discription.required' => 'Поле текст является обязательным'
        ];
    }
}
