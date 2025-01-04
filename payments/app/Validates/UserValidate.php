<?php

namespace App\Validates;

use Illuminate\Http\Request;

class UserValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}


