<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ExpiredAuthenticateException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'expiredAuthenticate';
        return $this->baseRenderer($error);
    }
}
