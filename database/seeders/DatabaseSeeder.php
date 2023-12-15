<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\AnswersTableSeeder;
use Database\Seeders\SurveysTableSeeder;
use Database\Seeders\QuestionsTableSeeder;
use Database\Seeders\ParticipantTableSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            SurveysTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class,
            ParticipantTableSeeder::class
        ]);
    }
}
