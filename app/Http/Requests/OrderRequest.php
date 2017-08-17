<?php

namespace Tikematic\Http\Requests;

use Auth;
use Tikematic\Models\{OrderItem, Ticket};
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
            "ticket_id" => "required|validateTicketAvailabilityAtThisTime",
            "ticket_amount" => "required|numeric|min:1",
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

            // user can only have one pending order
            if(Auth::user()->orders()->status("pending")->count() < 1) {
                // get ticket
                $ticket = Ticket::find($validator->getData()['ticket_id']);

                // ticket has a reserved amount, 0 means no tickets are reserved
                if ($ticket->reserved > 0) {

                    // get amount of paidOrLocked tickets
                    $paidOrPendingTickets = OrderItem::paidOrPending()->where('ticket_id', $validator->getData()['ticket_id'])->count();

                    // maximum amount of tickets that can be reserved but the
                    // requested order can still continue
                    $maxTicketsReserved = $ticket->reserved - $validator->getData()['ticket_amount'];

                    // check that there are enough tickets left for the order to continue
                    if($paidOrPendingTickets > $maxTicketsReserved) {
                        $validator->errors()->add('ticket_amount', 'Not enough tickets left!');
                    }
                }
            } else {
                $validator->errors()->add('existing_order', 'You already have a pre-existing pending order! Order not created.');
            }
        });
    }
}
