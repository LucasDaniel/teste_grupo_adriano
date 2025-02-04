<?php

namespace App\Validates;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string|unique:users|min:11|max:11',
            'email' => 'required|email|unique:users',
        ]);
    }
}


