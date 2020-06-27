<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if(Auth::attempt(['email' => $email, 'password' => $password, 'is_verified' => 1])) {
            $user = Auth::user();

            $token = $user->createToken($user->email . '-' . now());

            return response()->json([
                'message' => 'success',
                'token' => $token->accessToken
                                    ]);
        }

        return response()->json(['message' => 'fail']);
    }

    /**
     * Create a new user and send email verification
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function registerUser(Request $request)
    {
        $user = new User();
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->verification_code = sha1(time());
        $user->save();

        if ($user !== null) {
            echo 'Send verification email';
            //Send verification email
            MailController::sendSignupEmail($user->firstName, $user->email, $user->verification_code);

            //Notify user
            return response()->json(
                [
                    'message' => 'Verification email sent'
                ],
                200
            );
        }

        return response()->json(
            [
                'message' => 'Registration failed'
            ]
        );
    }

    public function verifyUser(Request $request)
    {
        $verification_code = $request->get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user !== null) {
            $user->is_verified = 1;
            $user->save();
            MailController::sendWelcomeEmail($user->email, $user->password);
            return view('auth.verify-success');
        }

    }
}
