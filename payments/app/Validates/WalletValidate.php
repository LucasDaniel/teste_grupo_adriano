<?php

namespace App\Validates;

use Illuminate\Http\Request;

class WalletValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'id_user' => 'required',
            'value' => 'required|integer'
        ]);
    }
}


