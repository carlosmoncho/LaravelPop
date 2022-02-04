<?php

namespace Database\Seeders;

use App\Models\DenunciaM;
use Illuminate\Database\Seeder;

class DenunciaMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DenunciaM::factory()->count(20)->create();
    }
}
