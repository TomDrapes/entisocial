<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        echo 'Validator called';
        return Validator::make(
            $data,
            [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
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
        echo 'Register User';
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
