<?php

namespace Tikematic\Http\Requests;

use Tikematic\Models\{Seat, OrderItem, Ticket};
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
            "seat" => "required|array",
            "seat.*" => "required|numeric|distinct|validateSeatAvailability",
        ];
    }

    /**
     * More validation.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // validate ticket amount
        $validator->after(function ($validator) {

            $seats = $validator->getData()['seat'];

            $filledItems = 0;
            foreach($seats as $order_item_id=>$seat_id) {

                if(OrderItem::find($order_item_id)->seat !== null) {

                    $filledItems++;
                }
            }

            if($filledItems > 0) {
                $validator->errors()->add('ticket_amount', 'Item already has a seat!');
            }
        });
    }
}
