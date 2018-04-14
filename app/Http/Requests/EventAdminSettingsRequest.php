<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventAdminSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // validation will be done inside the controller
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
            "event_name"            => "required|filled",
            "event_location"        => "required|max:100",
            "event_url"             => "required|url",
            //"event_currency"        => "required", // currency validator???
            "event_visibility"      => "required|boolean",
        ];
    }
}
