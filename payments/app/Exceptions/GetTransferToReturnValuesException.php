<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class GetTransferToReturnValuesException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'getTransferToReturnValues';
        return $this->baseRenderer($error);
    }
}
