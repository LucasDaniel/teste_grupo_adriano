<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository
{
	/**
     * Begin the model
     */
	public function __construct() {
		$this->model = new Admin();
	}

	/**
     * Makes login to use system
     * @param string
     * @return object
     */
    public function login(string $login): object {
        return $this->model::select('admin.id','admin.password')
					->where('admin.login',$login)
					->first();
    }

}