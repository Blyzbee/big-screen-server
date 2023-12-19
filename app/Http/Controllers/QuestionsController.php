<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class QuestionsController extends Controller
{
    public function getQuestions(Request $request): JsonResponse
    {
        // Use the correct model name (Question) and fetch all questions
        $questions = Questions::all();

        return response()->json([
            'questions' => $questions, // Wrap the questions in an associative array
        ]);
    }


    // La fonction qui permet de récupérer les questions qui appartiennt à un sondage particulier

    public function getQuestionsOneSurvey(Request $request, $survey_id): JsonResponse
    {
        // Vérifiez si le sondage existe
        $survey = Survey::find($survey_id);

        if (!$survey) {
            return response()->json(['error' => 'Sondage introuvable'], 404);
        }

        // Récupérez toutes les questions liées au sondage spécifié
        $questions = Questions::where('survey_id', $survey_id)->get();

        return response()->json(['questions' => $questions]);
    }
}
