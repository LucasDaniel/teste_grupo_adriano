<?php

namespace App\Services;

use App\Models\StateTransfer;
use App\Repositories\StateTransferRepository;

class StateTransferService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new StateTransferRepository();
    }
}
