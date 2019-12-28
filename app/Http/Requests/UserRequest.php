<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

class UserRequest extends FormRequest
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
            'user' => ['required','min:4',Rule::unique('users', 'user')->ignore($this->user, 'user')],
            'email' => ['required','email',Rule::unique('users','email')->ignore($this->email, 'email')],
            'role' => 'required'
        ];
    }
}
