<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SurveyController extends Controller
{
    public function getSurveys(Request $request): JsonResponse
    {
        $surveys = Survey::all();

        return response()->json([
            'surveys' => $surveys
        ]);
    }



}
