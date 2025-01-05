<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
	/**
     * Begin the model
     */
	public function __construct() {
		$this->model = new User();
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
}