<?php

namespace App\Validates;

use Illuminate\Http\Request;

class TransferValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
            'payer' => 'required|integer',
            'payee' => 'required|integer'
        ]);
    }
}


