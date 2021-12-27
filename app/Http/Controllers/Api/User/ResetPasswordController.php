<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
class ResetPasswordController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
        $status = Password::reset(
			$request->only('email', 'password', 'token', 'password_confirmation'),
			function ($user, $password) use ($request) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));

				$user->save();
				event(new PasswordReset($user));
			}
		);
        if ($status == Password::INVALID_TOKEN) {
            return ['success' => false]; // トークンが異なる場合の処理
        }
        return ['success' => true];
    }
}
