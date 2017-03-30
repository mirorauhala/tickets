<?php

namespace Tickematic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsPassword extends FormRequest
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
            "current_password"              => "required|password",
            "new_password"                  => "required|min:6|different:current_password",
            "new_password_confirmation"     => "required|same:new_password"
        ];
    }
}
