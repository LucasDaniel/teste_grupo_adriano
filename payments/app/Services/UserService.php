<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\TransferService;
use App\Exceptions\GetUserException;
use App\Exceptions\ValueEqualsZeroException;
use App\Exceptions\DontHaveMoneyException;

class UserService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->model = new User();
        $this->repository = new UserRepository();
    }

    /**
     * Get user and Wallet by user id
     * @param array
	 * @return object
     */
    public function createNewUser(array $arr): object {
        $this->model->name = $arr['name'];
        $this->model->cpf = $arr['cpf'];
        $this->model->email = $arr['email'];
        $this->model->password = $arr['password'];
        $this->model->save();
        return $this->model;
    }

    /**
     * Get user and Wallet by user id
     * @param int
	 * @return object or null
     */
    public function findUserAndWalletByUserId(int $id): object|string {
        $user_payer = $this->repository->findUserAndWalletByUserId($id);
        if (!$user_payer) throw new GetUserException();
        return $user_payer;
    }

    /**
     * Verify if value is 0, if true throw exception
     * Verify if user no have money to use
     */
    public function verifyUserHaveMoney($user,$value) {
        if ($value == 0) throw new ValueEqualsZeroException();
        if ($value < 0 && $user->value < -$value) throw new DontHaveMoneyException();
    }

    public function verifyCpfPassword(array $arr) {
        $cpf = $arr['cpf'];
        $password = md5($arr['password']);
    }

}
