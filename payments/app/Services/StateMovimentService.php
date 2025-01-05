<?php

namespace App\Services;

use App\Models\StateMoviment;
use App\Repositories\StateMovimentRepository;

class StateMovimentService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new StateMovimentRepository();
    }
}
