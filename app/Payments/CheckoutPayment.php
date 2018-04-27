<?php

namespace App\Payments;

use App\Exceptions\NullCheckoutCredentialsException;
use Illuminate\Support\Facades\Validator;

class CheckoutPayment
{
    /**
     * Order data.
     *
     * @var array
     */
    protected $order = [];

    /**
     * Default fields for an order.
     *
     * @var array
     */
    private $orderDefaults = [
        'VERSION'       => '0001',
        'STAMP'         => '',
        'AMOUNT'        => '',
        'REFERENCE'     => '',
        'MESSAGE'       => '',
        'LANGUAGE'      => 'FI',
        'RETURN'        => '',
        'CANCEL'        => '',
        'REJECT'        => '',
        'DELAYED'       => '',
        'COUNTRY'       => 'FIN',
        'CURRENCY'      => 'EUR',
        'DEVICE'        => '10', // 10 = XML, 1 = HTML, although it is not respected fully by the server
        'CONTENT'       => '1',
        'TYPE'          => '0',
        'ALGORITHM'     => '3',
        'DELIVERY_DATE' => '',
        'FIRSTNAME'     => '',
        'FAMILYNAME'    => '',
        'ADDRESS'       => '',
        'POSTCODE'      => '',
        'POSTOFFICE'    => '',
        'MAC'           => '',
        'EMAIL'         => '',
        'PHONE'         => '',
    ];

    /**
     * Has the order been validated.
     *
     * @var bool
     */
    protected $isValidated = false;

    /**
     * Response from endpoint.
     *
     * @var array
     */
    public $response = [];

    /**
     * Fields used to calculate MAC.
     *
     * @var array
     */
    protected $macFields = [
        'VERSION', 'STAMP', 'AMOUNT', 'REFERENCE', 'MESSAGE',
        'LANGUAGE', 'MERCHANT', 'RETURN', 'CANCEL', 'REJECT',
        'DELAYED', 'COUNTRY', 'CURRENCY', 'DEVICE', 'CONTENT',
        'TYPE', 'ALGORITHM', 'DELIVERY_DATE', 'FIRSTNAME', 'FAMILYNAME',
        'ADDRESS', 'POSTCODE', 'POSTOFFICE',
    ];

    /**
     * Return-Url query string fields.
     *
     * @var array
     */
    protected $returnUrlFields = [
        'VERSION', 'STAMP', 'REFERENCE', 'PAYMENT', 'STATUS', 'ALGORITHM',
    ];

    /**
     * Endpoint callback data. Contains the status for an order.
     *
     * @var array
     */
    public $returnResponse = [];

    /**
     * Endpoint URL.
     *
     * @var string
     */
    private $endpoint = 'https://payment.checkout.fi';

    /**
     * Merchant endpoint credentials.
     *
     * @var [type]
     */
    private $merchant = [];

    /**
     * Constructor for Checkout.
     *
     * @param string $mercant - Merchant ID
     * @param string $secret  - Merchant sercret key
     */
    public function __construct($merchant, $secret)
    {
        if (empty($merchant) || empty($secret)) {
            throw new NullCheckoutCredentialsException();
        }

        $this->merchant = [
            'MERCHANT'   => $merchant,
            'SECRET_KEY' => $secret,
        ];
    }

    /**
     * Load order information.
     *
     * @param array $order
     *
     * @return void
     */
    public function load(array $order)
    {
        foreach ($order as $key => $value) {
            $this->order[$key] = $value;
        }
    }

    /**
     * Validates the payload to send to the server.
     *
     * @return Validator
     */
    public function validate()
    {
        $validator = Validator::make($this->buildPayload($this->order), [
            'VERSION'       => 'required',
            'STAMP'         => 'required',
            'AMOUNT'        => 'required',
            'REFERENCE'     => 'required',
            'MERCHANT'      => 'required',
            'RETURN'        => 'required',
            'CANCEL'        => 'required',
            'CURRENCY'      => 'required',
            'DEVICE'        => 'required',
            'CONTENT'       => 'required',
            'TYPE'          => 'required',
            'ALGORITHM'     => 'required',
            'DELIVERY_DATE' => 'required',
            'MAC'           => 'required',
        ]);

        $this->isValidated = !$validator->fails();

        return $validator;
    }

    /**
     * Sends payment for the order.
     *
     * @return mixed
     */
    public function send()
    {
        if (!$this->isValidated) {
            return false;
        }

        $this->http(
            $this->endpoint,
            $this->buildPayload($this->order)
        );
    }

    /**
     * Get banks from response.
     *
     * @return array
     */
    public function banks()
    {
        return $this->response->payments->payment->banks;
    }

    /**
     * Get raw HTTP response.
     *
     * @return array
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * Execute a HTTP connection to endpoint.
     *
     * @param string $endpoint
     * @param array  $payload
     *
     * @return void
     */
    protected function http($endpoint, $payload)
    {
        libxml_use_internal_errors(true);

        $options = [
            CURLOPT_POST            => 1,
            CURLOPT_HEADER          => 0,
            CURLOPT_URL             => $endpoint,
            CURLOPT_FRESH_CONNECT   => 1,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_FORBID_REUSE    => 1,
            CURLOPT_TIMEOUT         => 20,
            CURLOPT_POSTFIELDS      => http_build_query($payload),
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = simplexml_load_string($response = curl_exec($ch));
        curl_close($ch);

        // XML Error parsing
        $errors = libxml_get_errors();

        if (!empty($errors)) {
            throw new \Exception('Error: '.$response);
        }

        $this->response = $result;
    }

    /**
     * Validate return URL signature.
     *
     * @param array $response
     */
    public function processCallback(array $response)
    {
        $hashString = $this->calculateHashString('&', $response, $this->returnUrlFields);

        $calculatedMac = strtoupper($this->calculateMac($hashString, $this->merchant['SECRET_KEY']));

        if ($calculatedMac === $response['MAC']) {
            $this->returnResponse = $response;

            return true;
        }
    }

    /**
     * Checks if the order is paid.
     *
     * @return bool
     */
    public function isPaid()
    {
        if (empty($this->returnResponse)) {
            throw new \Exception('You must validate the response before checking status.');
        }

        return in_array($this->returnResponse['STATUS'], [2, 7, 8, 10]);
    }

    /**
     * Builds payload to send to the endpoint.
     *
     * @param array $order
     *
     * @return array
     */
    protected function buildPayload($order)
    {
        $parameters = array_merge(
            $this->orderDefaults,
            $order,
            ['MERCHANT' => $this->merchant['MERCHANT']]
        );

        $hashString = $this->calculateHashString('+', $parameters, $this->macFields);

        $parameters['MAC'] = $this->calculateMac($hashString, $this->merchant['SECRET_KEY']);

        return $parameters;
    }

    /**
     * Builds the correct order of fields for HMAC.
     *
     * @param string $delimiter
     * @param array  $parameters
     * @param array  $fields
     *
     * @return string
     */
    protected function calculateHashString($delimiter, $parameters, $fields)
    {
        return implode(
            $delimiter,
            array_map(
                function ($field) use (&$parameters) {
                    return $parameters[$field];
                },
                $fields
            )
        );
    }

    /**
     * Calculates the Message Authentication Code.
     *
     * @param string $string
     * @param string $secret
     *
     * @return string
     */
    protected function calculateMac($string, $secret)
    {
        return hash_hmac('sha256', $string, $secret);
    }
}
