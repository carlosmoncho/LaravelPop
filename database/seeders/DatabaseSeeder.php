<?php

namespace Database\Seeders;

use App\Models\DenunciaA;
use App\Models\Etiqueta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(EtiquetaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmpleatsSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(DenunciaASeeder::class);
        $this->call(ValoracionSeeder::class);
        $this->call(MensajeSeeder::class);
        $this->call(DenunciaMSeeder::class);
        $this->call(ImagenSeeder::class);
    }
}
