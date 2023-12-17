<?php

namespace App\Models;

use App\Models\Survey;
use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Questions
 *
 * @package App\Models
 * @property int $id
 * @property int $survey_id
 * @property string $title
 * @property string $body
 * @property string $type
 * @property array $choices
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Answers[] $answers
 * @property-read int|null $answers_count
 * @property-read Survey $survey
 */
class Questions extends Model
{
    use HasFactory;

    /**
     * Une question pourra avoir plusieurs réponses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answers::class);
    }

    /**
     * Chaque instance de Questions appartient à un sondage (Survey).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
