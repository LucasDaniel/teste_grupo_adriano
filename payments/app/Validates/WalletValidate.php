<?php

namespace App\Validates;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WalletValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'value' => 'required|numeric'
        ]);
    }
}


