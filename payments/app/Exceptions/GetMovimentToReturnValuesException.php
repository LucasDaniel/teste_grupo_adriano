<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class GetMovimentToReturnValuesException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'getMovimentToReturnValues';
        return $this->baseRenderer($error);
    }
}
