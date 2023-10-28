<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreMerchantRequest;

class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createMerchant(StoreMerchantRequest $request)
    {
        // validate data
        $requestData = $request->validated();
        // App-Id and App-Token
        $appId = env('APP_ID');
        $appToken = env('APPTOKEN');
        $url = env('WEPAY_BASE_URL').'accounts';
        // Make Guzzle Http Client
        $client = new Client();
        try {
            // Send a POST request to WePay API
            $response = $client->post($url, [
                'headers' => [
                    'App-Id' => $appId,
                    'App-Token' => $appToken,
                    'Accept' => 'application/json',
                    'Api-Version' => '3.0',
                    'Content-Type' => 'application/json',
                ],
                'json' => $requestData,
            ]);
            // decode API response Data
            $responseData = json_decode($response->getBody());
            $status = $response->getStatusCode();
            // check user auth info and ceate save merchant account
            if (Auth::check()) {
                // Save Response data
                Merchant::create([
                    'user_id' => Auth::user()->id,
                    'account_id' => $responseData->id,
                    'legal_id' => Auth::user()->legal->legal_entity_id,
                    'name' => $responseData->name,
                    'description' => $responseData->description,
                ]);
            }
            // Return response and perform any necessary actions
            return response()->json($responseData);
        } catch (Exception $e) {
            // Get the error message
            $errorMessage = $e->getMessage();
            if (str_contains($errorMessage, 'Could not resolve host')) {
                return response()->json(['error' => 'Check your internet connection']); // Correct the spelling
            } else {
                // Return the error message
                return response()->json(['error' => $errorMessage]);
            }
        }
    }
}
