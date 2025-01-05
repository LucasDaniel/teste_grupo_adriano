<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Hash;

class AdminService extends BaseService
{
    /**
     * Constructor, set repository
     */
    public function __construct() {
        $this->repository = new AdminRepository();
    }

    /**
     * Verify if cpf and password is correct
     * @param array
     * @return object
     */
    public function login(array $arr): object {
        $login = $arr['login'];
        $password = $arr['password'];
        $admin = $this->repository->login($login);
        if (!$admin || !Hash::check($password, $admin->password)) throw new NotAuthenticateException();
        return $admin;
    }

}
