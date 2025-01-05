<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TransferNotFinishedToReturnValuesException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'transferNotFinishedToReturnValues';
        return $this->baseRenderer($error);
    }
}
