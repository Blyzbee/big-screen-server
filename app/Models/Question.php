<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'type', 'choices'];

    protected $casts = [
        'choices' => 'array', // Pour s'assurer que 'choices' est stocké comme un tableau JSON
    ];

    // Si vous souhaitez ajouter des relations ou des méthodes spécifiques au modèle, faites-le ici
}
