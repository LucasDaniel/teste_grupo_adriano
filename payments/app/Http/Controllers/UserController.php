<?php

namespace App\Http\Controllers;

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
}
