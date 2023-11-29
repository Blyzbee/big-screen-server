<?php

namespace Database\Factories;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class QuestionsFactory extends Factory
{
    public function definition(): array
    {

        $types = ['A', 'B', 'C'];


        // Créez une enquête et obtenez son ID
        $surveyId = Survey::factory()->create()->id;


        return [
            'survey_id' => $surveyId,
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'type' => fake()->randomElement($types),
            'choices' => json_encode(['Choice 1', 'Choice 2', 'Choice 3'])
        ];
    }
}
