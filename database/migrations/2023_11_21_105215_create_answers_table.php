<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            //Clé étrangère qui définit le participant qui répond à la question
            $table->foreignId('participant_id')->constrained();
            //Clé étrangère qui définit la question dont on parle
            $table->foreignId('question_id')->constrained();
            // La réponse qui est donnée à la question
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
