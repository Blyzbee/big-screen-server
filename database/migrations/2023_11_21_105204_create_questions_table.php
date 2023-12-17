<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            // Colonne qui définit le sondage de la question
            $table->foreignId('survey_id')->constrained();

            // Titre de la question
            $table->string('title');

            // Corps de la question
            $table->text('body');

            // Type de la question qui détermine l'affichage du formulaire
            $table->enum('type', ['A', 'B', 'C']);

            // Données JSON présentant les différentes réponses disponibles
            $table->json('choices')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
