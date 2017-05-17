<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
//            'email' => 'required|unique:contacts|email,id,'.auth()->user()->id,
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages() {

        return [
            'email.unique' => 'Please enter valid unique email address.',
            'name.regex' => 'Please enter valid name.'
        ];
    }

}
