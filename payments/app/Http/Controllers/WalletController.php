<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use App\Validates\WalletValidate;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Constructor, set model and repository
     */    
    public function __construct() {
        $this->service = new WalletService();
        $this->validate = new WalletValidate();
    }
}
