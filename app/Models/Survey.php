<?php

namespace App\Models;

use App\Models\User;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Survey
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Questions[] $questions
 * @property-read int|null $questions_count
 * @property-read User $user
 */
class Survey extends Model
{
    use HasFactory;

    /**
     * Un sondage a plusieurs questionnaires.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

    /**
     * Chaque instance de Survey appartient à un administrateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
