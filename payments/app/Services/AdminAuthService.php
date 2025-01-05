<?php

namespace App\Services;

use App\Models\AdminAuth;
use App\Repositories\AdminAuthRepository;
use Illuminate\Support\Facades\Hash;

class AdminAuthService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new AdminAuthRepository();
    }

    /**
     * Create new wallet with id_admin
     * @param int
     * @return void
     */
    public function createNewAdminAuth(int $id_admin): void {
        $this->repository->createNewAdminAuth($id_admin);
    }

    /**
     * Update the user wallet value by id user
     * @param int, string
     * @return object
     */
    public function updateAdminToken(int $id_admin): object {
        return $this->repository->updateAdminToken($id_admin);
    }

    /**
     * Verify if token exists
     * @param string
     * @return bool
     */
    public function verifyTokenExists(string $token): bool {
        return $this->repository->verifyTokenExists($token);
    }

    /**
     * 
     */
    public function verifyTokenExpired(string $token): bool {
        return $this->repository->verifyTokenExpired($token);
    }
}
