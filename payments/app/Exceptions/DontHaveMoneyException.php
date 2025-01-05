<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class DontHaveMoneyException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'dontHaveMoney';
        return $this->baseRenderer($error);
    }
}
