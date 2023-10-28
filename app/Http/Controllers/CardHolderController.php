<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CardHolderController extends Controller
{
    public function createCardholder()
    {
        $url = 'https://dev.bpcbt.com/v2/cardholders';
        $headers = [
            'X-API-KEY: YOUR_TOKEN',
            'Content-Type: application/json',
        ];

        $data = [
            'billingAddress' => [
                'city' => 'Budapest',
                'country' => 'HU',
                'line1' => 'Szabadsag ter',
                'line2' => '9',
                'postalCode' => '1850',
                'state' => 'Budapest',
            ],
            'email' => 'd@harrxample.com',
            'phoneNumber' => '123123123',
            'firstName' => 'Harry',
            'lastName' => 'Waters',
            'dateOfBirth' => '1998-03-24',
            'verification' => [
                'idType' => 'passport',
                'documentId' => '1111111111',
            ],
            'status' => 'active',
        ];

        $response = Http::withHeaders($headers)->post($url, $data);

        // You can handle the response as needed
        $statusCode = $response->status();
        $responseData = $response->json();

        return response()->json($responseData, $statusCode);
    }
}
