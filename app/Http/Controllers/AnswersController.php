<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AnswersController extends Controller
{
    public function getAnswers(Request $request): JsonResponse
    {
        $answers = Answers::all();

        return response()->json([
            'answers' => $answers,
        ]);
    }

    public function RegisterAnswers(Request $request): JsonResponse
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'participant_id' => 'required|exists:participants,id',
            'response' => 'required',
        ]);

        // Création d'une nouvelle réponse
        $answers = new Answers();
        $answers->question_id = $request->question_id;
        $answers->participant_id = $request->participant_id;
        $answers->response = $request->response;

        // Enregistrement de la réponse dans la base de données
        $answers->save();

        // Réponse réussie
        return response()->json(['message' => 'Réponse ajoutée avec succès'], 201);
    }
}
