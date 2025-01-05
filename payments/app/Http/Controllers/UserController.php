<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use App\Services\UserService;
use App\Services\AdminAuthService;
use App\Validates\UserValidate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Constructor, set service
     */    
    public function __construct() {
        $this->service = new UserService();
        $this->validate = new UserValidate();
    }

    public function createNewUser(Request $request) {
        $this->validate->validate($request);
        $this->service->createNewUserWithWallet($request->all());
        return true;
    }
}
