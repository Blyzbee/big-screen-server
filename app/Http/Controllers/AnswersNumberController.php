<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Http\Request;

class AnswersNumberController extends Controller
{
    // Question 6

    public function getAnswersCount(Request $request, $questionId)
    {
        // Utilisez la relation pour obtenir la question associée
        $question = Answers::find($questionId);

        // Vérifiez si la question existe
        if (!$question) {
            return response()->json(['error' => 'Question introuvable'], 404);
        }

        // Spécifiez la valeur de réponse recherchée
        if($questionId === '6' ){
            $requestData = ["Oculus Quest","Oculus Rifts","HTC Vive","Windows Mixed
            Reality","Valve index"];
        }if ($questionId === '7' ){
            $requestData = ["SteamVR", "Occulus store", "Viveport", "Windows store"];
        }if ($questionId === '10'  ) {
            $requestData = ["regarder la TV en direct", "regarder des films, travailler",
            "jouer en solo", "jouer en équipe"];
        }if($questionId >= '11' || $questionId >= '15'  ){
            $requestData = ["1","2","3","4","5"];
        }


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
