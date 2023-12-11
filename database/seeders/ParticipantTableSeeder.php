<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Participant;
use Illuminate\Database\Seeder;

class ParticipantTableSeeder extends Seeder
{
    public function run()
    {
        // Créez 20 participants fictifs
        Participant::factory()->count(20)->create();
    }
}
