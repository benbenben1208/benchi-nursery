<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = User::find($request->route('id'));

        if ($user->hasVerifiedEmail()) {

            return redirect(config('app.frontend_url'));
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return  redirect(config('app.frontend_url'));
    }
}
