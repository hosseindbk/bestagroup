<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone'     => ['required', 'string', 'min|10'  , 'max:255'],
            'username'  => ['required', 'string', 'max:255'],
            'email'     => ['string'  , 'email' , 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8'  , 'confirmed'],
        ];
    }
}
