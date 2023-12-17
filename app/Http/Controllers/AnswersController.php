<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AnswersController extends Controller
{
    /**
     * Get answers for a specific participant.
     *
     * @param Request $request
     * @param int $participantId
     *
     * @return JsonResponse
     */
    public function getAnswersParticipant(Request $request, $participantId): JsonResponse
    {
        $answers = Answers::where('participant_id', $participantId)->get();

        return response()->json([
            'participant_id' => $participantId,
            'answers' => $answers,
        ]);
    }

    /**
     * Register answers for a participant.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function registerAnswers(Request $request): JsonResponse
    {
        // Print the request data for debugging purposes.
        print_r($request->all());

        // Validate the request data.
        $request->validate([
            '0' => 'required|email', // Assuming '0' is the key for the participant email.
            'answers.*.id' => 'required|numeric',
            'answers.*.response' => 'required|string',
        ]);

        // Create a new participant.
        $participant = new Participant();
        $participant->url = Str::random(10);
        $participant->email = $request->input('0');
        $participant->save();

        $participantId = $participant->id;

        // Loop through the answers and save each one.
        foreach ($request->input('answers') as $answer) {
            $response = new Answers();
            $response->question_id = $answer['id'];
            $response->participant_id = $participantId;
            $response->response = $answer['response'];
            $response->created_at = now();
            $response->save();
        }

        // Return a success response.
        return response()->json(['message' => 'Réponses enregistrées avec succès']);
    }
}
