<?php

namespace App\Validates;

use Illuminate\Http\Request;

class MovimentValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'id_user' => 'required|numeric',
            'value' => 'required|numeric'
        ]);
    }

    public function validateIdMoviment(Request $request) {
        $request->validate([
            'id_moviment' => 'required'
        ]);
    }
}


