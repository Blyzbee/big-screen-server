<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class QuestionsController extends Controller
{
    /**
     * Get all questions.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getQuestions(Request $request): JsonResponse
    {
        // Utilisez le nom de modèle correct (Question) et récupérez toutes les questions
        $questions = Question::all();

        return response()->json([
            'questions' => $questions, // Enveloppez les questions dans un tableau associatif
        ]);
    }

    /**
     * Get questions belonging to a specific survey.
     *
     * @param Request $request
     * @param int     $survey_id
     *
     * @return JsonResponse
     */
    public function getQuestionsOneSurvey(Request $request, $survey_id): JsonResponse
    {
        // Vérifiez si le sondage existe
        $survey = Survey::find($survey_id);

        if (!$survey) {
            return response()->json(['error' => 'Sondage introuvable'], 404);
        }

        // Récupérez toutes les questions liées au sondage spécifié
        $questions = Question::where('survey_id', $survey_id)->get();

        return response()->json(['questions' => $questions]);
    }
}
