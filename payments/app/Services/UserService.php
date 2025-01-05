<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\TransferService;
use App\Services\WalletService;
use App\Services\AdminAuthService;
use App\Exceptions\GetUserException;
use App\Exceptions\ValueEqualsZeroException;
use App\Exceptions\DontHaveMoneyException;
use App\Exceptions\NotAuthenticateException;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new UserRepository();
    }

    /**
     * Create user, wallet and authenticate
     * @param array
     * @return void
     */
    public function createNewUserWithWallet(array $request): void {
        $user_id = $this->repository->createNewUser($request);
        $walletService = new WalletService();
        $walletService->createNewWallet($user_id);
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
     * @param object, int
     * @return void
     */
    public function verifyUserHaveMoney(object $user, int $value): void {
        if ($value == 0) throw new ValueEqualsZeroException();
        if ($value < 0 && $user->value < -$value) throw new DontHaveMoneyException();
    }

}
