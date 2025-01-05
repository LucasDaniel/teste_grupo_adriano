<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ValueEqualsZeroException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'valueEqualsZero';
        return $this->baseRenderer($error);
    }
}
