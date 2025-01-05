<?php

namespace App\Repositories;

use App\Models\StateMoviment;
use Illuminate\Database\Eloquent\Model;

class StateMovimentRepository extends BaseRepository
{

    /**
     * Begin the model
     */
    public function __construct() {
        $this->model = new StateMoviment();
    }

    /**
     * Get id by state transfer
     * @param string
     * @return int
     */
    public function getIdByStateMoviment(string $state): int {
        return $this->model::where('state','LIKE',$state)
                ->get()->first()->id;
    }
    
}