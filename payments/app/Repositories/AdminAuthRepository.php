<?php

namespace App\Repositories;

use App\Models\AdminAuth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminAuthRepository extends BaseRepository
{
    /**
     * Begin the model
     */
    public function __construct() {
        $this->model = new AdminAuth();
    }

    /**
     * Create new wallet with id_admin
     * @param int
     * @return void
     */
    public function createNewAdminAuth(int $id_admin): void {
        $this->model->id_admin = $id_admin;
        $this->model->token = Hash::make(rand(1,9999));
        $this->model->expiration = Carbon::now()->format("Y-m-d H:i:s");
        $this->model->save();
    }
    
    /**
     * Update the admin wallet value by id admin
     * @param int, int
     * @return object
     */
    public function updateAdminToken(int $id_admin): object {
        $token = Hash::make($id_admin);
        $ua = $this->model::where('id_admin', $id_admin)->first();
        $ua->token = $token;
        $ua->expiration = Carbon::now()->addMinutes(10)->format("Y-m-d H:i:s");
        $ua->save();
        return $ua;
    }

    /**
     * Verify if token exists
     * @param string
     * @return bool
     */
    public function verifyTokenExists(string $token): bool {
        return $this->model::where('token', $token)->exists();
    }

    /**
     * Verify if token expired
     * @param string
     * @return bool
     */
    public function verifyTokenExpired(string $token): bool {
        return $this->model::where('token', $token)
                           ->where('expiration','<',Carbon::now()->format("Y-m-d H:i:s"))
                           ->exists();
    }
    
}