<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Http\Request;

class AnswersNumberController extends Controller
{

    public function getAnswersCount(Request $request, $questionId)
    {
        // Utilisez la relation pour obtenir la question associée
        $question = Answers::find($questionId);

        // Vérifiez si la question existe
        if (!$question) {
            return response()->json(['error' => 'Question introuvable'], 404);
        }

        // Spécifiez la valeur de réponse recherchée
        $requestData = ["Oculus Quest","Oculus Rifts","HTC Vive","Windows Mixed
        Reality","Valve index"];

        // Initialisez le tableau de résultats
        $responseCounts = [];

        // Parcourez chaque élément du tableau $requestData
        foreach ($requestData as $responses) {
        // Comptez le nombre de réponses pour la question donnée avec la valeur spécifiée
        $count = Answers::where('question_id', $questionId)
                       ->where('response', $responses)
                       ->count();

        // Ajoutez le résultat au tableau de résultats
        $responseCounts[$responses] = $count;
        }

        return response()->json(['question_id' => $questionId, 'response_counts' => $responseCounts]);

    }
}
