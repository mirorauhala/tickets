<?php

namespace Tests\Traits;

use Laravel\Passport\Passport;

trait DoRequest
{
    /**
     * URI that the request will be pointed to.
     *
     * @var string
     */
    protected $uri;

    /**
     * An array of fields that by default are correct.
     *
     * @var array
     */
    protected $fields;

    /**
     * Stores the response of the request.
     *
     * @var \Illuminate\Foundation\Testing\TestResponse
     */
    protected $response;

    /**
     * Overrides that will be merged to fields before sending the request.
     *
     * @var array
     */
    protected $fieldOverrides;

    /**
     * Sets user for Passport authentication. Additional scopes can be passed.
     *
     * @param \Domain\User\User $user
     * @param array $scopes
     * @return self
     */
    protected function passportActingAs($user = null, $scopes = [])
    {
        Passport::actingAs(
            $user === null ? $this->user : $user,
            $scopes
        );

        return $this;
    }

    /**
     * Run the request.
     *
     * @return void
     */
    protected function doRequest($method)
    {
        $this->response = $this->$method($this->uri, $this->fields());
    }

    /**
     * Get fields.
     *
     * @return array
     */
    protected function fields()
    {
        return is_array($this->fields) ? $this->fieldOverrides() : [];
    }

    /**
     * Merge field overrides.
     *
     * @return array
     */
    protected function fieldOverrides()
    {
        return array_merge($this->fields, (array) $this->fieldOverrides);
    }
}
