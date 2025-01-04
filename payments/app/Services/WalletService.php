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
        $this->model = new Wallet();
        $this->repository = new WalletRepository();
    }
}
