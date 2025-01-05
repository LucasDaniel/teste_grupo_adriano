<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class MovimentWasReturnedException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'movimentWasReturned';
        return $this->baseRenderer($error);
    }
}
