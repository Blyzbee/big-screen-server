<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        // Vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 401);
        }

        // Vérifie si le mot de passe correspond
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid password',
            ], 401);
        }

        return response()->json([
            'token' => $user->remember_token,
        ]);
    }


    // Fonction suppression de l'administrateur

    // Récupération de son id
    public function logout($id)
    {

        // La méthode find() permet de sélection l'utilisateur qui correspond à l'id
        $user = User::find($id);

        // On utilise la méthode delete () pour supprimer
        $user->delete();

        /* On aura en réponse ce petit message pour nous
        confirmer que l'opération s'est bien passer */

        $data = [
            'status' => 200,
            'message' => "Data deleted successfully"
        ];

        // On retourne la réponse de la rêque dans un format JSON
        return response()->json($data, 200);
    }
}
