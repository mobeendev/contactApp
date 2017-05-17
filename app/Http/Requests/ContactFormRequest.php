<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest {

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
            'email' => 'required|unique:contacts|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:200',
            'dob' => 'required|date_format:Y-m-d',
            'company' => 'required|max:250|regex:/^[a-zA-Z0-9 \- .]+$/',
        ];
    }

    public function messages() {

        return [
            'dob.date_format' => 'Please enter date in following format YYYY-MM-DD.',
            'email.unique' => 'Please enter valid unique email address.',
            'name.regex' => 'Please enter valid name.'
        ];
    }

}
