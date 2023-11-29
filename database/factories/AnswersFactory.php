<?php

namespace Database\Factories;

// database/factories/AnswersFactory.php

use App\Models\Answers;
use App\Models\Participant;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswersFactory extends Factory
{
    protected $model = Answers::class;

    public function definition()
    {
        return [
            'participant_id' => Participant::factory(),
            'question_id' => Questions::factory(),
            'response' => $this->faker->paragraph,
        ];
    }
}
