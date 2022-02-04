<?php

namespace Database\Seeders;

use App\Models\Empleats;
use Illuminate\Database\Seeder;

class EmpleatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleats::factory()->count(20)->create();
    }
}
