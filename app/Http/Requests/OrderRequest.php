<?php

namespace Tikematic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "tickets" => "required|array",
            "tickets.*.id" => "required|numeric|validateTicketAvailabilityAtThisTime|min:1",
            "tickets.*.amount" => "required|numeric",
        ];
    }
}
