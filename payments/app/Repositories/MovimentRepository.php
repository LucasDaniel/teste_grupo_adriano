<?php

namespace App\Repositories;

use App\Enums\EnumStateMoviment;
use App\Models\Moviment;
use Illuminate\Database\Eloquent\Collection;

class MovimentRepository extends BaseRepository
{
    /**
     * Begin the model
     */
    public function __construct() {
        $this->model = new Moviment();
    }

    /**
     * Make the moviment of user with value
     * @param array
     * @return int
     */
    public function createMoviment(array $moviment): int {
        $this->model->id_state_moviment = $moviment['id_state_moviment'];
        $this->model->id_user = $moviment['id_user'];
        $this->model->value = $moviment['value'];
        $this->model->save();
        return $this->model->id;
    }

    /**
     * Get data by id with, payee, payer, value and string state
     * @param int
     * @return object or null
     */
    public function findWithState(int $id): object|null {
        return $this->model::select('moviments.id_user','moviments.value','moviments.returned','st.state')
                        ->join('state_moviments as st', 'st.id', '=', 'moviments.id_state_moviment')
                        ->where('moviments.id',$id)
                        ->get()
                        ->first();
    }

    /**
     * Return the moviment into returned 1
     * @param int
     * @return void
     */
    public function changeReturnMoviment(int $id_moviment): void {
        $moviment = Moviment::find($id_moviment);
        $moviment->returned = 1;
        $moviment->save();
    }
    
}