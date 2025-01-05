<?php

namespace App\Services;

use App\Models\UserAuth;
use App\Repositories\UserAuthRepository;

class UserAuthService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->model = new UserAuth();
        $this->repository = new UserAuthRepository();
    }

    /**
     * Create new wallet with id_user
     * @param int
     * @return void
     */
    public function createNewUserAuth(int $id_user): void {
        $this->model->id_user = $id_user;
        $this->model->token = '';
        $this->model->save();
    }

    /**
     * Update the user wallet value by id user
     * @param int, string
     * @return void
     */
    public function updateUserValue(int $id_user): void {
        $this->repository->updateUserValue($id_user);
    }
}
