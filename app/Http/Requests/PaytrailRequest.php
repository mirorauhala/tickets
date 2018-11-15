<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Paytrail\Http\Client as PaytrailClient;

class PaytrailRequest extends FormRequest
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
            'ORDER_NUMBER'      => 'required',
            'TIMESTAMP'         => 'required',
            'PAID'              => 'required',
            'METHOD'            => 'required',
            'RETURN_AUTHCODE'   => 'required',
        ];
    }

    /**
     * More validation.
     *
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    public function withValidator($validator)
    {
        // validate ticket amount
        $validator->after(function ($validator) {
            // make new PaytrailClient
            $client = new PaytrailClient(
                env('PAYTRAIL_KEY', '13466'),
                env('PAYTRAIL_SECRET', '6pKF4jkv97zmqBJ3ZL8gUw5DfT2NMQ')
            );

            $client->connect();
            if (! $client->validateChecksum(
                    $validator->getData()['RETURN_AUTHCODE'],
                    $validator->getData()['ORDER_NUMBER'],
                    $validator->getData()['TIMESTAMP'],
                    $validator->getData()['PAID'],
                    $validator->getData()['METHOD']
                )
            ) {
                $validator->errors()->add('custom_error', 'Payment checksum is invalid');

                return view('errors.custom', [
                    'error_title'   => 'Payment checksum is invalid',
                    'error_subtext' => 'Couldn\'t finish order. Contact support.',
                ]);
            }
        });
    }
}
