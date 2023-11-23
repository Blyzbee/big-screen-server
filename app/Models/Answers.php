<?php

namespace App\Models;

use App\Models\Questions;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answers extends Model
{
    use HasFactory;

    // Chaque instance de Answers appartient à un sondage (Survey).

    public function questions()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }

    //  Chaque instance de Answers appartient à une question.

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

}
