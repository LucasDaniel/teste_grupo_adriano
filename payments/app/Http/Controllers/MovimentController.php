<?php

namespace App\Http\Controllers;

use App\Services\MovimentService;
use App\Validates\MovimentValidate;
use Illuminate\Http\Request;

class MovimentController extends Controller
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->service = new MovimentService();
        $this->validate = new MovimentValidate();
    }

    /**
     * Do moviment between users
     * @param Request
     * @return string
     */
    public function moviment(Request $request): string|bool {
        $this->validate->validate($request);
        return $this->service->movimentUser($request->all());
    }

    /**
     * Return moviment of type is finished
     * @param Request
     * @return string
     */
    public function returnMoviment(Request $request) {
        $this->validate->validateIdMoviment($request);
        return $this->service->returnMovimentUser($request->all());
    }
}
