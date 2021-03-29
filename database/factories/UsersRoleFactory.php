<?php

namespace Database\Factories;

use App\Models\UsersRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsersRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 20),
            'role_id' => $this->faker->numberBetween(1, 4)
        ];
    }
}
