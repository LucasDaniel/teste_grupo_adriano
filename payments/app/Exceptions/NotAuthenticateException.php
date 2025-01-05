<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotAuthenticateException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'notAuthenticate';
        return $this->baseRenderer($error);
    }
}
