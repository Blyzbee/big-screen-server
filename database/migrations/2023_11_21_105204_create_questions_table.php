<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // Colonne qui définit le sondage de la question
            $table->foreignId('survey_id')->constrained();
            $table->integer('title');
            $table->text('body');
            // Type de la question qui détermine l'affichage du formulaire
            $table->enum('type', ['A', 'B', 'C']);
            // Données JSON présentant les différentes réponses disponible
            $table->json('choices')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
