<?php

namespace App\Validates;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MovimentValidate extends BaseValidate {

    public function validate(Request $request) {
        $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'value' => 'required|numeric'
        ]);
    }

    public function validateIdMoviment(Request $request) {
        $request->validate([
            'id_moviment' => 'required|integer|exists:moviments,id'
        ]);
    }
}


