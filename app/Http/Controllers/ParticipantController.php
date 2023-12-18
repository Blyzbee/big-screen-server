<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ParticipantController extends Controller
{
    /**
     * Register a new participant.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function registerParticipant(Request $request): JsonResponse
    {
        $request->validate([
            'url' => 'required',
            'email' => 'required',
        ]);

        // Create a new participant
        $participant = new Participant();
        $participant->url = $request->url;
        $participant->email = $request->email;
        $participant->created_at = now();
        $participant->updated_at = now();

        // Save the participant to the database
        $participant->save();

        // Successful response
        return response()->json(['message' => 'Participant ajouté(e) avec succès'], 201);
    }

    /**
     * Get all participants.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getParticipants(Request $request): JsonResponse
    {
        // Fetch all participants
        $participants = Participant::all();

        return response()->json([
            'participants' => $participants,
        ]);
    }
}
