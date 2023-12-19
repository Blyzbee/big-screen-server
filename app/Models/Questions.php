<?php

namespace App\Models;

use App\Models\Survey;
use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questions extends Model
{
    use HasFactory;


    // Une question pourra avoir plusieurs réponses

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }


    // Chaque instance de Questions appartient à un sondage (Survey).

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
