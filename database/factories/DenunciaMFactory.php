<?php

namespace Database\Factories;

use App\Models\Mensaje;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DenunciaMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'mensaje_id' => Mensaje::inRandomOrder()->first()->id,
        ];
    }
}
