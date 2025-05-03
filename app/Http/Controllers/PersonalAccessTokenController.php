<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PersonalAccessTokenController extends Controller
{
    /**
     * Create a new personal access token for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $user = Auth::user();
        $token = $user->createToken($request->name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    /**
     * Get list of user tokens
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listTokens(Request $request)
    {
        $user = Auth::user();
        $tokens = $user->tokens;

        return response()->json($tokens, 200);
    }

    /**
     * Delete the specified token.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteToken($id)
    {
        $token = PersonalAccessToken::findOrFail($id);

        if (Auth::user()->id !== $token->tokenable_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $token->delete();

        return response()->json(['message' => 'Token deleted successfully.'], 200);
    }
}