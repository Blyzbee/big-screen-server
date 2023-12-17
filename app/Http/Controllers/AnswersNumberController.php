<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AnswersNumberController extends Controller
{
    /**
     * Get the count of answers for a specific question.
     *
     * @param Request $request
     * @param string $questionId
     *
     * @return JsonResponse
     */
    public function getAnswersCount(Request $request, $questionId): JsonResponse
    {
        // Use the relationship to get the associated question
        $question = Answers::find($questionId);

        // Check if the question exists
        if (!$question) {
            return response()->json(['error' => 'Question introuvable'], 404);
        }

        // Specify the desired response values based on the question ID
        if ($questionId === '6') {
            $requestData = ["Oculus Quest", "Oculus Rifts", "HTC Vive", "Windows Mixed Reality", "Valve index"];
        } elseif ($questionId === '7') {
            $requestData = ["SteamVR", "Occulus store", "Viveport", "Windows store"];
        } elseif ($questionId === '10') {
            $requestData = ["regarder la TV en direct", "regarder des films, travailler", "jouer en solo", "jouer en équipe"];
        } elseif ($questionId >= '11' || $questionId >= '15') {
            $requestData = ["1", "2", "3", "4", "5"];
        }

        // Initialize the results array
        $responseCounts = [];

        // Loop through each item in the $requestData array
        foreach ($requestData as $responses) {
            // Count the number of answers for the given question with the specified value
            $count = Answers::where('question_id', $questionId)
                ->where('response', $responses)
                ->count();

            // Add the result to the results array
            $responseCounts[$responses] = $count;
        }

        return response()->json(['question_id' => $questionId, 'response_counts' => $responseCounts]);
    }
}
