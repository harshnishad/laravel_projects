<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this if you need authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|regex:/^[A-Za-z_ ]+$/',
            'email' => 'required|email|unique:users,email,' . $this->route('user'),
            'phone' => 'required|digits:10|unique:users,phone,' . $this->route('user'),
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
