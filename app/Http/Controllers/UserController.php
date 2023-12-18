<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Authentifie un utilisateur.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        /** @var User|null $user */
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
            'password' => $user->password
        ]);
    }

    /**
     * Déconnecte un utilisateur.
     *
     * @param int $id Identifiant de l'utilisateur.
     * @return JsonResponse
     */
    public function logout($id): JsonResponse
    {
        /** @var User|null $user */
        $user = User::find($id);

        // Vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        // Supprime l'utilisateur
        $user->delete();

        $data = [
            'status' => 200,
            'message' => 'Data deleted successfully',
        ];

        return response()->json($data, 200);
    }
}
