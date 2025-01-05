<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use App\Services\UserService;
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
        $user = $this->service->createNewUser($request->all());
        $walletService = new WalletService();
        $walletService->createNewWallet($user->id);
        return true;
    }
}
