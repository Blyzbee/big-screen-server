<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AnswersController extends Controller
{
    public function getAnswers(Request $request): JsonResponse
    {
        $answers = Answers::all();

        return response()->json([
            'answers' => $answers,
        ]);
    }

    public function registerAnswers(Request $request)
    {
        $request->validate([
            '*.id' => 'required|numeric',
            '*.response' => 'required|string',
        ]);

        // Création du participant
        $participant = new Participant();
        $participant->url = Str::random(10);
        $participant->email = $request->input('0');
        $participant->save();

        $participantId = $participant->id;

        foreach ($request->all() as $answer) {
            // Création de chaque question
            $response = new Answers();
            $response->question_id = $answer['id'];
            $response->participant_id = $participantId;
            $response->response = $answer['response'];
            $response->created_at = now();
            $response->save();
        }

        // Réponse de succès
        return response()->json(['message' => 'Réponses enregistrées avec succès']);
    }
}
