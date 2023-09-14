<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $srp = 100;
        $orig = $srp - ($srp *.1);

        return [
            "name" => $this->faker->name(),
            "description" => $this->faker->text(),
            "srp" => $srp,
            "orig" => $orig,
            "qty" => 100,
            'user_id' => 1
        ];
    }
}
