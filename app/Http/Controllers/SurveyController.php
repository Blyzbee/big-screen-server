<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question; // Ajout du modèle Question
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SurveyController extends Controller
{
    /**
     * Get all surveys.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getSurveys(Request $request): JsonResponse
    {
        $surveys = Survey::all();

        return response()->json([
            'surveys' => $surveys
        ]);
    }
}
