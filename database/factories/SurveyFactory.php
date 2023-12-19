<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


class SurveyFactory extends Factory
{


    public function definition(): array
    {

        return [
            'title' => fake()->sentence(),
            'user_id' => User::factory()->create()->id
        ];
    }
}
