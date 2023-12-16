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
Route::post('/login',[UserController::class, 'login']);
// Api de logout
Route::delete('/logout',[UserController::class, 'logout']);

// ----------------------------------------------------------

// Api affichage des données surveys
Route::get('/surveys',[SurveyController::class, 'getSurveys']);
// Api créer un nouveu survey
Route::post('/surveys/add',[SurveyController::class, 'newSurvey']);

// ----------------------------------------------------------

// Api créer des nouvelles questions
// Route::post('/questions/add',[QuestionsController::class, 'newSurvey']);

// Api réponses
Route::get('/participant',[ParticipantController::class, 'getParticipant']);

// Api données graphiques
Route::get('/questions/{questionId}/answers/count', [AnswersNumberController::class, 'getAnswersCount']);



//////////////////////////////////////////////////////////////////////

// Routes Api Page Public
//--------------------------------------------------------------------------------------

// Questions

// Api affichage des questions
Route::get('/questions',[QuestionsController::class, 'getQuestions']);
Route::post('/add/participant',[ParticipantController::class, 'RegisterParticipant']);

//---------------------------------------------------------------------------------------

// Answers

// Api recupération des réponses du formulaire
Route::post('/answers/register',[AnswersController::class, 'RegisterAnswers']);
// Api affichage des réponses d'un utilisateur
Route::get('/answers/{participandId}',[AnswersController::class, 'getAnswersParticipant']);


