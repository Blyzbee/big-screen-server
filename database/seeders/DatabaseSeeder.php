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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UsersTableSeeder::class,
            QuestionsTableSeeder::class,
            SurveysTableSeeder::class,
            AnswersTableSeeder::class,
            ParticipantTableSeeder::class
        ]);
    }
}
