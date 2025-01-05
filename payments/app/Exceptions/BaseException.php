<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Dictionary\Dictionary;
 
class BaseException extends \Exception
{
    use Dictionary;

    public function baseRenderer($error): JsonResponse
    {
        return response()->json([
            'message' => $this->dictionary['error'][$error]['msg'],
            'code' => $this->dictionary['error'][$error]['code']
        ], $this->dictionary['error'][$error]['code']);
    }
}
