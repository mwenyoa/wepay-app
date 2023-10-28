<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class StripeController extends Controller
{
    public function createAccountLink()
    {
        $stripe = new StripeClient('sk_test_51LMAIlDX2r6kDZUhYI5keKpszhbSZWajGarPN8JvFtAbkhMsNZWCAlOrVuauQDG1thW0r0ROE1H7pSVWIWsO84Gj007QRyRWGG');

        try {
            $accountLink = $stripe->accountLinks->create([
                'account' => '{{CONNECTED_ACCOUNT_ID}}',
                'refresh_url' => 'https://localhost:8000/reauth',
                'return_url' => 'https://localhost:8000/return',
                'type' => 'account_onboarding',
            ]);

            return redirect($accountLink->url);
        } catch (ApiErrorException $e) {
            // Handle Stripe API error
            return back()->withError($e->getMessage());
        }
    }
}

