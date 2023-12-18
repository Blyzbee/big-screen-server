<?php

namespace App\Models;

use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Participant
 *
 * @package App\Models
 * @property int $id
 * @property string $url
 * @property string $email
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Answers[] $answers
 * @property-read int|null $answers_count
 */
class Participant extends Model
{
    use HasFactory;

    /**
     * Un participant pourra avoir plusieurs réponses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answers::class);
    }
}
