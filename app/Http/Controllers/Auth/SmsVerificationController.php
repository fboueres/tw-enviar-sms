<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class SmsVerificationController extends Controller
{
    public function send(string $celNumber, SmsServiceInterface $smsService)
    {
        $random_code = \mt_rand(1000, 9999);

        session([
            'sms-validation-code' => $random_code
        ]);
        
        $response = $smsService->send($celNumber, "You SMS validation code: $random_code");

        if($response == 200){
            return 'success';
        }

        return response('failure-on-sending-sms-code', $response);
    }
}
