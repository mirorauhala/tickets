<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventAdminTicketRequest extends FormRequest
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
            'ticket_name'               => 'required|filled',
            'ticket_price'              => 'required|numeric',
            'ticket_vat'                => 'required|numeric',
            'ticket_max'                => 'required|numeric',
            'ticket_availableAt'        => 'required|date',
            'ticket_unavailableAt'      => 'required|date',
        ];
    }
}
