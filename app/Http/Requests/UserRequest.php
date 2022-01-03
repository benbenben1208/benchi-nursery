<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'firstName' => 'required|string|max:191',
            'lastName' => 'required|string|max:191',
            'email' => 'unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|string',
            'birth' => 'required|date',
            'gender' => 'integer|digits_between:1,2',
        ];
    }
}
