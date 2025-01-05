<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Utils\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->login = "admin";
        $admin->password = Hash::make("admin");
        $admin->save();
    }
}
