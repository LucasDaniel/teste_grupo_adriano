<?php

namespace App\Services;

use App\Models\Wallet;
use App\Repositories\WalletRepository;

class WalletService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new WalletRepository();
    }

    /**
     * Create new wallet with id_user
     * @param int
     * @return void
     */
    public function createNewWallet(int $id_user): void {
        $this->repository->createNewWallet($id_user);
    }

    /**
     * Update the user wallet value by id user
     * @param int, int
     * @return void
     */
    public function updateUserValue(int $id_user,int $value): void {
        $this->repository->updateUserValue($id_user,$value);
    }
}
