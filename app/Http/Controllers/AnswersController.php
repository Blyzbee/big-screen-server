<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AnswersController extends Controller
{
    public function getAnswersParticipant(Request $request, $participantId): JsonResponse
    {
        $answers = Answers::all()->where('participant_id', $participantId);

        return response()->json([
            'participant_id' => $participantId,
            'answers' => $answers
        ]);
    }

    public function getAnswersParticipantByUrl(Request $request, $participantUrl): JsonResponse
    {
        // Trouver le participant par URL
        $participant = Participant::where('url', $participantUrl)->first();

        // Vérifier si le participant existe
        if (!$participant) {
            return response()->json(['error' => 'Participant non trouvé'], 404);
        }

        // Récupérer le participantId
        $participantId = $participant->id;

        // Récupérer les réponses par participantId
        $answers = Answers::where('participant_id', $participantId)->get();

        return response()->json([
            'participantId' => $participantId,
            'answers' => $answers
        ]);
    }

    public function registerAnswers(Request $request)
    {
        $request->validate([
            'formData' => 'required|array|min:1',
            'formData.*' => 'required|string',
        ]);

        $url = Str::random(10);

        // Création du participant
        $participant = new Participant();
        $participant->url = $url;
        $participant->email = $request->formData[1];
        $participant->save();

        $participantId = $participant->id;

        foreach ($request->formData as $questionId => $response) {
            // Création de chaque question
            $answer = new Answers();
            $answer->question_id = $questionId;
            $answer->participant_id = $participantId;
            $answer->response = $response;
            $answer->created_at = now();
            $answer->save();
        }

        // Réponse de succès
        return response()->json([
            'message' => 'Réponses enregistrées avec succès',
            'url' => $url
        ]);
    }
}
