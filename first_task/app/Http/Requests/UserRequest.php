<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change this if you want to implement authorization logic
    }

    public function rules(): array
    {
        $userId = $this->user ? $this->user->id : null; // Get user ID if it exists

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => 'required|string|max:255|unique:users,phone,' . $userId,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_id' => 'nullable|exists:projects,id', 
        ];
    }
}