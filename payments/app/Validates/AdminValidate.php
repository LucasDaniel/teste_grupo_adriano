<?php

namespace App\Validates;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'login' => 'required|string|exists:admin',
            'password' => 'required|string',
        ]);
    }
}


