<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'username' => 'required|unique:staffs,username',
            'password' => 'required|max:128',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:150',
            'email' => 'required|email',

        ];
    }
}
