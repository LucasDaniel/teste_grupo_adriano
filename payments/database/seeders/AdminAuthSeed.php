<?php

namespace Database\Seeders;

use App\Models\AdminAuth;
use App\Utils\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminAuthSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new AdminAuth();
        $admin->id_admin = 1;
        $admin->token = Hash::make(rand(1,9999));
        $admin->expiration = Carbon::now()->format("Y-m-d H:i:s");
        $admin->save();
    }
}
