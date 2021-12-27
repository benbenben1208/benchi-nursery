<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use App\Models\CorporationJoboffer;
use App\Models\User;
use App\Mail\sendOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendOfferController extends Controller
{
    public function sendOffer(Request $request)
    {
        $users = collect(User::all());
        $emails = $users->pluck('email')->toArray();
        foreach($emails as $email) {
            $job = CorporationJoboffer::findOrFail(1);
            Mail::to($email)->send(new sendOffer($job));
        }
        //選択したユーザーにオファーメールを送信する。
        // Mail::to($emails)->queue(new sendOffer($job));
        return 200;
    }
}
