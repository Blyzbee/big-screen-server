<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AnswersNumberController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route Api administrateur unique

// ----------------------------------------------------------

// Api de login
Route::post('/login', [UserController::class, 'login']);
// Api de logout
Route::delete('/logout', [UserController::class, 'logout']);

// ----------------------------------------------------------

// Api données graphiques
Route::get('/questions/{questionId}/answers/count', [AnswersNumberController::class, 'getAnswersCount']);


////////////////////////questions/{questionId}/answers/count///////////////////////////////////////////////

// Routes Api Page Public
//--------------------------------------------------------------------------------------

// Récupérer les questionnaires
Route::get('/surveys', [SurveyController::class, 'getSurveys']);
Route::post('/surveys/add', [SurveyController::class, 'newSurvey']);


// Questions
// Api affichage des questions
Route::get('/questions', [QuestionsController::class, 'getQuestions']);
// Api affichaque des questions qui appartiennent à un sondage précis
Route::get('/questions/{survey_id}', [QuestionsController::class, 'getQuestionsOneSurvey']);


// ----------------------------------------------------------------------------------------

// Participant
// Récupération des participants
Route::get('/participants', [ParticipantController::class, 'getParticipants']);
// Api ajout d'un participant
Route::post('/participant/add', [ParticipantController::class, 'RegisterParticipant']);

//---------------------------------------------------------------------------------------

// Answers
// Api recupération des réponses du formulaire
Route::post('/answers/register', [AnswersController::class, 'RegisterAnswers']);
// Api affichage des réponses d'un participant
Route::get('/answers/{participantId}', [AnswersController::class, 'getAnswersParticipant']);
Route::get('/answersByUrl/{participantUrl}', [AnswersController::class, 'getAnswersParticipantByUrl']);
Route::get('/allAnswers', [AnswersController::class, 'getAllAnswers']);
