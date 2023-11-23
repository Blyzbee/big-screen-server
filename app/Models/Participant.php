<?php

namespace App\Models;

use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }

}
