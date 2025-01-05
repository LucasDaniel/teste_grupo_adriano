<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class GetMovimentException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'getMoviment';
        return $this->baseRenderer($error);
    }
}
