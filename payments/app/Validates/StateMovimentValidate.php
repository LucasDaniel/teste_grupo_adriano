<?php

namespace App\Validates;

use Illuminate\Http\Request;

class StateMovimentValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'state' => 'required|string',
        ]);
    }
}


