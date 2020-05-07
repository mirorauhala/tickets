<?php

namespace Domain\Users;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $language;
    public $password;
    public $superuser;
    public $country_code;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'first_name'   => $request->get('first_name') ?? null,
            'last_name'    => $request->get('last_name'),
            'email'        => $request->get('email'),
            'phone'        => $request->get('phone'),
            'language'     => $request->get('language'),
            'password'     => $request->get('password'),
            'superuser'    => $request->get('superuser'),
            'country_code' => $request->get('country_code'),
        ]);
    }
}
