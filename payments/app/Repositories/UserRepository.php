<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
	/**
     * Begin the model
     */
	public function __construct() {
		$this->model = new User();
	}

	/**
     * Get user and Wallet by user id
     * @param int
	 * @return object
     */
    public function createNewUser(array $arr): int {
		$this->model = new User();
        $this->model->name = $arr['name'];
        $this->model->cpf = $arr['cpf'];
        $this->model->email = $arr['email'];
        $this->model->save();
        return $this->model->id;
    }

	/**
     * Find the user his type and wallet by id
	 * @param int
	 * @return object or null
     */
	public function findUserAndWalletByUserId(int $id): object|null {
		return $this->model::select('users.id','users.name','users.cpf','users.email','w.value')
					->leftJoin('wallets as w', 'w.id_user', '=', 'users.id')
					->where('users.id',$id)
					->first();
	}

	/**
	 * Find user by cpf
	 * @param string
	 * @return object or null
	 */
	public function findUserByCpf(string $cpf): object|null {
		return $this->model::select('users.id','users.name','users.cpf','users.email')
					->where('users.cpf',$cpf)
					->first();
	}
	
}