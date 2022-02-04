<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Database\Factories\MensajeFactory;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensaje::factory()->count(20)->create();
    }
}
