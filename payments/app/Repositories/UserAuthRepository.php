<?php

namespace App\Repositories;

use App\Models\UserAuth;

class UserAuthRepository extends BaseRepository
{
    /**
     * Begin the model
     */
    public function __construct() {
        $this->model = new UserAuth();
    }
    
    /**
     * Update the user wallet value by id user
     * @param int, int
     * @return string
     */
    public function updateToken(int $id_user): string {
        $token = md5($id_user);
        $ua = $this->model::find($id_user);
        $ua->token = $token;
        $ua->save();
        return $token;
    }
    
}