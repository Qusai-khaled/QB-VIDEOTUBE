<?php

namespace App\Http\Requests\FrontEnd\Messages;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', 'string', 'max:191', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:191', 'min:9'],
            'message' => ['required', 'string', 'min:8', 'max:500'],
        ];
    }
}
