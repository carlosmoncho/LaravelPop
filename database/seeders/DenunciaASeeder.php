<?php

namespace Database\Seeders;

use App\Models\DenunciaA;
use App\Models\Empleats;
use Illuminate\Database\Seeder;

class DenunciaASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DenunciaA::factory()->count(20)->create();
    }
}
