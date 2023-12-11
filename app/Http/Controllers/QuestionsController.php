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
}
