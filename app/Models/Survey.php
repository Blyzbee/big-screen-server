<?php

namespace App\Models;

use App\Models\User;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;


    // Un sondage a plusieurs questionnaire

    public function survey()
    {
        return $this->hasMany(Questions::class);
    }

    // Chaque insatnce de Survey appartion à un administrateur

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
