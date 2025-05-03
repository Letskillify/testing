<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetTokenController extends Controller
{
    /**
     * Request a password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\JsonResponse
     */
    public function requestReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $email = $request->input('email');
        $token = Str::random(60);
        $createdAt = Carbon::now();

        // Use PasswordResetToken model
        PasswordResetToken::updateOrCreate(
            ['email' => $email],
            ['token' => $token, 'created_at' => $createdAt]
        );

        // Send email with reset link (implementation depends on your mail setup)
        // Mail::to($email)->send(new ResetPasswordMail($token));

        return response()->json(['message' => 'Password reset link sent to your email.'], 200);
    }

    /**
     * Reset the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $email = $request->input('email');
        $token = $request->input('token');

        // Use PasswordResetToken model
        $resetRequest = PasswordResetToken::where('email', $email)->where('token', $token)->first();

        if (!$resetRequest) {
            return response()->json(['error' => 'Invalid token or email.'], 404);
        }

        if (Carbon::parse($resetRequest->created_at)->addHours(24)->isPast()) {
            $resetRequest->delete();
            return response()->json(['error' => 'Token has expired.'], 410); // 410 Gone
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $resetRequest->delete(); // Remove the used token.

        return response()->json(['message' => 'Password reset successfully.'], 200);
    }
}