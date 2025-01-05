<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class FinishTransferException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'finishTransfer';
        return $this->baseRenderer($error);
    }
}
