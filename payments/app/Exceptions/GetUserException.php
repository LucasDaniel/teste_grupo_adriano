<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class GetUserException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'getUser';
        return $this->baseRenderer($error);
    }
}
