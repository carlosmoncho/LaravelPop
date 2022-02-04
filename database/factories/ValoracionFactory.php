<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValoracionFactory extends Factory
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
            'user_id' => User::inRandomOrder()->first()->id,
            'valorador_id' => User::inRandomOrder()->first()->id,
            'valoracion' => $this->faker->randomFloat(0, 1, 5 ),
            'product_id' => Product::inRandomOrder()->first()->id,
            'comentario' => $this->faker->text(),
        ];
    }
}
