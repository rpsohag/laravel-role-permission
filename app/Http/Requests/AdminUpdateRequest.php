<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required', 'unique:admins,username,'.$this->route('admin')],
            'email' => ['required'],
            'country' => ['required'],
            'designation' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.unique' => 'The username has already been taken. Choose another one.',
        ];
    }
}
