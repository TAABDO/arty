<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'type'=> ['required', 'string', 'max:255'],
            'password'=>['required'],
            'image'=>'image|mimes:jpg,png,jpeg,gif',

        ];
    }
}
