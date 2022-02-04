<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Etiqueta;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'precio' => $this->faker->randomFloat(2, 1, 100 ),
            'sale' => $this->faker->boolean(),
            'comprador_id' => User::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
