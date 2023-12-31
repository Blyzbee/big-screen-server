<?php

namespace Database\Factories;

use App\Models\Answers;
use App\Models\Participant;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class AnswersFactory
 *
 * @package Database\Factories
 */
class AnswersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'participant_id' => Participant::factory(),
            'question_id' => 1,
            'response' => $this->faker->paragraph,
        ];
    }
}
