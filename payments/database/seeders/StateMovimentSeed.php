<?php

namespace Database\Seeders;

use App\Enums\EnumStateMoviment;
use App\Models\StateMoviment;
use App\Utils\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateMovimentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $st = new StateMoviment();
        $st->state = EnumStateMoviment::DEPOSIT->value;
        $st->save();

        $st = new StateMoviment();
        $st->state = EnumStateMoviment::WITHDRAW->value;
        $st->save();
    }
}
