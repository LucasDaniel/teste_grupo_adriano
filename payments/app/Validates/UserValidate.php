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
            'password' => 'required|string',
        ]);
    }

    public function validateAuthenticate(Request $request) {
        $request->validate([
            'cpf' => 'required|string|exists:uses,cpf|min:11|max:11',
            'password' => 'required|string',
        ]);
    }
}


