<?php

namespace App\Http\Controllers;

use App\Services\UserAuthService;
use App\Validates\UserAuthValidate;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    /**
     * Constructor, set model and repository
     */    
    public function __construct() {
        $this->service = new UserAuthService();
    }
}
