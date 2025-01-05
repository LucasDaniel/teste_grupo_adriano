<?php

namespace App\Validates;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TransferValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
            'payer' => 'required|integer|exists:users,id',
            'payee' => 'required|integer|exists:users,id'
        ]);
    }

    public function validateIdTransfer(Request $request) {
        $request->validate([
            'id_transfer' => 'required|integer|exists:transfers,id'
        ]);
    }
}


