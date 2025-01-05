<?php

namespace App\Http\Controllers;

use App\Services\StateMovimentService;
use App\Validates\StateMovimentValidate;
use Illuminate\Http\Request;

class StateMovimentController extends Controller
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->service = new StateMovimentService();
        $this->validate = new StateMovimentValidate();
    }

}
