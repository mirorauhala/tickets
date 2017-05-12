<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TransactionsController extends Controller
{

    /**
     * Show the password change form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTransactions(Request $request)
    {
        $user = $request->user();

        return view('settings.transactions.all')
            ->with([
                "transactions" => $user->transactions,
            ]);
    }

    /**
     * Show the password change form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSpecificTransaction()
    {
        return view('settings.transactions.specific');
    }

}
