<?php

namespace App\Http\Controllers;

use App\Services\StateTransferService;
use App\Validates\StateTransferValidate;
use Illuminate\Http\Request;

class StateTransferController extends Controller
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->service = new StateTransferService();
        $this->validate = new StateTransferValidate();
    }

}
