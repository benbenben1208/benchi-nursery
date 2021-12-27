<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink(
            $request->only('email')
        );


        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'パスワード再設定メールを送信しました', 'status' => true], 200)
            : response()->json(['message' => 'パスワード再設定メールを送信できませんでした。', 'status' => false], 401);
    }
}
