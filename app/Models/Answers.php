<?php

namespace App\Models;

use App\Models\Questions;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Answers
 *
 * @package App\Models
 * @property int $id
 * @property int $question_id
 * @property int $participant_id
 * @property string $response
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Questions $question
 * @property-read Participant $participant
 */
class Answers extends Model
{
    use HasFactory;

    /**
     * Chaque instance de Answers appartient à une question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }

    /**
     * Chaque instance de Answers appartient à un participant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
