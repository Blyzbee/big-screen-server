<?php

namespace Database\Factories;

use App\Models\Survey;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * Class QuestionsFactory
 *
 * @package Database\Factories
 */
class QuestionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Questions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $types = ['A', 'B', 'C'];

        // Créez une enquête et obtenez son ID
        $surveyId = Survey::factory()->create()->id;

        // Générez des choix en fonction du type
        $choices = $this->generateChoices($types);

        return [
            'survey_id' => $surveyId,
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement($types),
            'choices' => json_encode($this->generateChoices($this->faker->randomElement($types))),
        ];
    }

    /**
     * Fonction pour générer des choix en fonction du type.
     *
     * @param array $types
     *
     * @return array
     */
    private function generateChoices(array $types): array
    {
        return $types === 'A'
            ? ['Choice A1', 'Choice A2', 'Choice A3']
            : ($types === 'B'
                ? ['']
                : ($types === 'C' ? ['1', '2', '3', '4', '5'] : []));
    }
}
