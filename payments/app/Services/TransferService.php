<?php

namespace App\Services;

use App\Models\Transfer;
use App\Repositories\TransferRepository;

class TransferService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->model = new Transfer();
        $this->repository = new TransferRepository();
    }
}
