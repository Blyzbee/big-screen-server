<?php

namespace App\Models;

use App\Models\User;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answers extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }

    public function participant()
    {
        return $this->belongsTo(Questions::class, 'participant_id');
    }

}
