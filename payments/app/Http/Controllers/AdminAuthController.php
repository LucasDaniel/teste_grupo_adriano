<?php

namespace App\Http\Controllers;

use App\Services\AdminAuthService;
use App\Validates\AdminAuthValidate;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    /**
     * Constructor, set model and repository
     */    
    public function __construct() {
        $this->service = new AdminAuthService();
    }
}
