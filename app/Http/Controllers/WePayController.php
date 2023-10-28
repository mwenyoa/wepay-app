<?php
namespace App\Http\Controllers;
use Log;
use App\Models\Legal;
use GuzzleHttp\Client;
use App\Models\User; //
use Illuminate\Http\Request;
use App\Http\Requests\LegalRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Part\File;
use Illuminate\Support\Facades\Redirect;
use App\Models\Merchant; // Import your Merchant model

class WePayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function createLegalEntity(Request $request)
    {

        // WePay API URL
        $url = env('WEPAY_BASE_URL').'legal_entities';

        // app id and token
        $appId = env('APP_ID');
        $appToken = env('APPTOKEN');

        // Validate the form data
        $validata = $request->validate([
            // Add validation rules for each field
            'country' => 'required|string',
             'controller' => [
                "email" => ['required ', 'email']
             ]
        ]);

        // Prepare the data to send to WePay API
        $data = [
            'country' => $request->country,
            'controller' => [
                'email' => $request->controller_email
                ]];

        // Create a Guzzle HTTP client
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
                'json' => $data,
            ]);
        
            // Get the response body as JSON
            $responseData = json_decode($response->getBody());
         
            // Handle the response as needed
            $status = $response->getStatusCode();
            $user_id = Auth::user()->id;
                // check if user is authenticated
                if (Auth::check()) {
                    Legal::create([
                        'user_id' => $user_id,
                        'legal_entity_id' => $responseData->id,
                        'resource_name' => $responseData->resource,
                        'created_time' => $responseData->create_time,
                        'path' => $responseData->path
                    ]);
                } else {
                    return response()->json(['error' => 'User is not authenticated.'], 401);
                }
                  
                
            // // Return the API response
            return response()->json($responseData);
            
        
        } catch (\Exception $e) {
            // Get the error message from the exception using getMessage()
            $errorMessage = $e->getMessage();
            if (str_contains($errorMessage, 'Duplicate entry')) {
                return response()->json(['error' => 'Legal entity already exists'], 400);
            } else {
                // Handle other database or general exceptions
                return response()->json(['error' => $errorMessage], 500);
            }
        }

    }

}

