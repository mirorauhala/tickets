<?php

namespace App\Validators;

use Auth, Hash;

class PasswordValidator {
    /**
    * Validate password
    **/
    public function validatePassword($attribute, $value, $parameters, $validator) {
        return Hash::check($value, Auth::user()->getAuthPassword());
    }
}
