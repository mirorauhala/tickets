<?php

namespace App\Http\Requests;

use App\Rules\TicketForSale;
use App\Rules\NoPendingOrders;
use App\Rules\CheckTicketReservation;
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
            'ticket_id'     => [
                'bail',
                'required',
                new NoPendingOrders,
                new TicketForSale,
            ],
            'ticket_amount' => [
                'required',
                'integer',
                'min:1',
                new CheckTicketReservation($this->ticket_id),
            ],
        ];
    }
}
