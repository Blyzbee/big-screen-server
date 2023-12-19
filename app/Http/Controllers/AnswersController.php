<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AnswersController extends Controller
{
    public function getAllAnswers(Request $request): JsonResponse
    {
        $answers = Answers::all();

        return response()->json([
            'answers' => $answers
        ]);
    }

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


    public function getAllParticipantsWithAnswers(): JsonResponse
{
    // Récupérer tous les participants
    $participants = Participant::all();

    // Initialiser un tableau pour stocker les réponses de chaque participant
    $participantsWithAnswers = [];

    foreach ($participants as $participant) {
        $participantId = $participant->id;

        // Récupérer les réponses par participantId
        $answers = Answers::where('participant_id', $participantId)->get();

        // Organiser les réponses par question
        $organizedAnswers = [];

        foreach ($answers as $answer) {
            $questionId = $answer->question_id;

            // Si la question n'est pas déjà dans le tableau, l'initialiser
            if (!isset($organizedAnswers[$questionId])) {
                $organizedAnswers[$questionId] = [
                    'questionId' => $questionId,
                    'questionBody' => $answer->question->body, // Assurez-vous d'ajuster cela en fonction de votre modèle de question
                    'responses' => [],
                ];
            }

            // Ajouter la réponse au tableau des réponses de la question
            $organizedAnswers[$questionId]['responses'][] = [
                'responseId' => $answer->id,
                'response' => $answer->response,
            ];
        }

        // Stocker les réponses du participant dans le tableau principal
        $participantsWithAnswers[] = [
            'participantId' => $participantId,
            'participantName' => $participant->name, // Ajouter le nom du participant si nécessaire
            'organizedAnswers' => array_values($organizedAnswers),
        ];
    }

    return response()->json($participantsWithAnswers);
}




    public function registerAnswers(Request $request)
    {
        // Print the request data for debugging purposes.
        print_r($request->all());

        // Validate the request data.
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
