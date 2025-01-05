<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use App\Services\AdminService;
use App\Services\AdminAuthService;
use App\Validates\AdminValidate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Constructor, set service
     */    
    public function __construct() {
        $this->service = new AdminService();
        $this->validate = new AdminValidate();
    }

    public function authenticate(Request $request) {
        $this->validate->validate($request);
        $admin = $this->service->login($request->all());
        $adminAuthService = new AdminAuthService();
        $adminAuth = $adminAuthService->updateAdminToken($admin->id); 
        return $adminAuth->token;
    }
}
