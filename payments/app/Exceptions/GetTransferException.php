<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class GetTransferException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'getTransfer';
        return $this->baseRenderer($error);
    }
}
