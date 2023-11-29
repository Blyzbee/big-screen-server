<?php

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    public function definition()
    {
        return [
            'url' => $this->faker->url,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}

