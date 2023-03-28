<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Player::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'velocity' => $this->faker->numberBetween(1, 100),
            'gender' => $this->faker->randomElement([0, 1]),
            'skill_level' => $this->faker->numberBetween(1, 100),
            'strength' => $this->faker->numberBetween(1, 100),
            'reaction' => $this->faker->numberBetween(1, 100),
        ];
    }
}
