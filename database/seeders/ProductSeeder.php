<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const NUM_ETIQUETAS=9;
    public function run()
    {
        Product::factory(250)->create()->each(function ($product){

            $product->etiquetas()->attach($this->randomArray());
        });
    }
    public function randomArray(){
        $arrayUsersId = [];
        for ($i = 0; $i < self::NUM_ETIQUETAS; $i++){
            $userIdRandom = random_int(1,10);
            $arrayUsersId[$userIdRandom] = $userIdRandom;
        }
        return $arrayUsersId;
    }
}

