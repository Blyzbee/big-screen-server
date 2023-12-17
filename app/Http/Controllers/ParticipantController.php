<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ParticipantController extends Controller
{
    public function RegisterParticipant(Request $request): JsonResponse {
        $request->validate([
            'url' => 'required',
            'email' => 'required'
        ]);

        // Création d'une nouvelle réponse
        $participant = new Participant();
        $participant->url= $request->url;
        $participant->email = $request->email;
        $participant->created_at = timestamp();
        $participant->updated_at = timestamp();

        // Enregistrement de la réponse dans la base de données
        $participant->save();

        // Réponse réussie
        return response()->json(['message' => 'Participant ajouté(e) avec succès'], 201);
    }

    public function getParticipants(Request $request): JsonResponse
    {
        // Use the correct model name (Question) and fetch all questions
        $participants = Participant::all();

        return response()->json([
            'participants' => $participants, // Wrap the questions in an associative array
        ]);
    }
}
