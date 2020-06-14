<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code) {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendWelcomeEmail($email, $password) {
        Mail::to($email)->send(new WelcomeEmail(['email' => $email, 'password' => $password]));
    }
}
