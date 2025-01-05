<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userService = new UserService();
        $userService->createNewUserWithWallet([
            "name" => "Lucas Daniel Beltrame",
            "cpf" => "00000000001",
            "email" => "lucas@email.com",
        ]);

        $userService->createNewUserWithWallet([
            "name" => "Lima Rodrigues",
            "cpf" => "00000000002",
            "email" => "lima@email.com",
        ]);

        $userService->createNewUserWithWallet([
            "name" => "Padaria",
            "cpf" => "00000000003",
            "email" => "padaria@email.com",
        ]);

        $userService->createNewUserWithWallet([
            "name" => "Farmacia",
            "cpf" => "00000000004",
            "email" => "farmacia@email.com",
        ]);

    }
}
