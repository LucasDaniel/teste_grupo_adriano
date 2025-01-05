<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeleteException extends BaseException
{
    public function render(Request $request): JsonResponse
    {
        $error = 'delete';
        return $this->baseRenderer($error);
    }
}
