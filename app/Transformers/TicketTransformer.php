<?php

namespace App\Transformers;

use Helper;
use App\Models\Ticket;
use League\Fractal\TransformerAbstract;

class TicketTransformer extends TransformerAbstract
{
    public function transform(Ticket $ticket)
    {
        return [
            'id' => $ticket->id,
            'name' => $ticket->name,
            'price' => $ticket->price,
            'price_pretty' => Helper::decimalMoneyFormatter($ticket->price, "EUR"),
            'vat' => $ticket->vat,
            'maxAmountPerTransaction' => $ticket->maxAmountPerTransaction,
            'is_seatable' => $ticket->is_seatable,
            'event_id' => $ticket->event_id,
        ];
    }
}
