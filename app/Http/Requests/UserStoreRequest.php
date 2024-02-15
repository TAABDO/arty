<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'domain' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'image'=> 'image | mimes: png,jpg,jpeg,gif',
        ];
    }
}
