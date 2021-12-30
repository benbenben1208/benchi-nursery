<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function checkout()
    {
        $line_items = [
            [
                'name' => '登録時即時決済テスト',
                'description' => '登録時即時決済テスト説明',
                'amount' => 10000,
                'currency' => 'jpy',
                'quantity' => 1,
            ],
        ];
        config('services.stripe.st_key');
        \Stripe\Stripe::setApiKey(config('services.stripe.st_key'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$line_items],
            'success_url' => url('/user/stripe/success'),
            'cancel_url' => url('/user/stripe/cancel'),
        ]);

        return [
            $session,
            'publicKey' => config('services.stripe.pb_key'),
        ];
    }
    public function subscription(Request $request)
    {
        // $user = Auth::guard('users')->user();
        $email = User::latest()->first()->email;
        $user = User::where('email', $email)->first();
        return view('afterpay',  [
            'intent' => $user->createSetupIntent()
        ]);
        // return [
        //     'intent' => $user->createSetupIntent()
        // ];

    }
    public function afterpay(Request $request)
    {
         // $anchor = Carbon::parse('first day of next month');

        // $request->user()->newSubscription('default', 'price_monthly')
        //             ->anchorBillingCycleOn($anchor->startOfDay())
        //             ->create($request->paymentMethodId);
        try {
            // $user = User::findOrFail(Auth::guard('users')->id());
            $user = User::latest()->first();
            $stripeCustomer = $user->createOrGetStripeCustomer();
            $paymentMethod = $request->stripePaymentMethod;

            $plan = config('services.stripe.basic_plan_id');
            $user->newSubscription('default', $plan)
                ->create($paymentMethod);

            return [
                'status' => 'success',
                'request' => $request->all(),
            ];
        } catch (\Exception $e) {
            return [
                'message' => $e->getMessage(),
                'request' => $request
            ];
        }
    }
}
