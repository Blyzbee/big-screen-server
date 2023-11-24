<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
Route::get('/surveys',[SurveyController::class, 'getQuestions']);
// Api créer un nouveu survey
Route::post('/surveys/add',[SurveyController::class, 'newSurvey']);

// ----------------------------------------------------------
// Api créer des nouvelles questions
Route::post('/questions/add',[QuestionsController::class, 'newSurvey']);


//////////////////////////////////////////////////////////////////////


// Routes Api Page Public

//--------------------------------------------------------------------------------------

// Questions
// Api affichage des questions
Route::get('/questions',[Questionstroller::class, 'getQuestions']);

//---------------------------------------------------------------------------------------

// Answers
// Api recupération des réponses
Route::post('/answers',[Answerstroller::class, 'RegisterAnswers']);
// Api affichage des réponses d'un utilisateur
Route::get('/answers/{id}',[Answerstroller::class, 'getAnswers']);


