<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //receive api response
     public function PaymentMethods(PaymentMethodRequest  $request){
         $data = $request->validated();

            //  create payment method record
           $record = PaymentMethod::create([
                'create_time' => $data['create_time'],
                'expire_time' => $data['expire_time'],
                'payment_method_id' =>$data['id'],
                'api_version' => $data['api_version'],
                'resource' => $data['resource'],
                'user_id' => auth()->user()->id,
            ]);
            // // Return the user response
            return response()->json($record);

     }

}
