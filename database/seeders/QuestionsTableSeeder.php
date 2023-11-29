<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Création de quelques questions pour le sondage
        Questions::factory(10)->create();
    }
}
