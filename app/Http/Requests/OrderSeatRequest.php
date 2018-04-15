<?php

namespace App\Http\Requests;

use App\Models\Seat;
use Illuminate\Foundation\Http\FormRequest;

class OrderSeatRequest extends FormRequest
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
            'seat'                  => 'required|array',
            'seat.*.order_item_id'  => 'required|integer|min:1|distinct|validateOrderItemStatusAndSeatAvailability',
            'seat.*.seat_id'        => 'required|integer|min:1|distinct|validateSeatAvailability',
        ];
    }
}
