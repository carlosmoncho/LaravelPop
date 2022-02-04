<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Etiqueta;
use App\Models\Imagen;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $idUser = User::inRandomOrder();
        return [
            'emisor_id' => $idUser->first()->id,
            'receptor_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'contenido' => $this->faker->text(),
        ];
    }
}
