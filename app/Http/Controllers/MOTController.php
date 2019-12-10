<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use DateTime;
use Carbon\Carbon;

class MOTController extends Controller
{
    public function results(Request $request)
    {
    	$registration = $request->input('registration');
    	$dvsaToken = env("DVSA_TOKEN");
        $headers = ['x-api-key' => $dvsaToken, 'Accept' => 'application/json+v2'];

    	$client = new \GuzzleHttp\Client(['headers' => $headers, 'http_errors' => false]);

    	$response = $client->request('GET', 'http://beta.check-mot.service.gov.uk/trade/vehicles/mot-tests?registration='. $registration);
        
        $statuscode = $response->getStatusCode();


        if (200 === $statuscode) {
          $carsInformation = (json_decode((string) $response->getBody()));
          $completedDate = $carsInformation[0]->motTests[0]->completedDate;

          $expiryDate = Carbon::createFromFormat('Y.m.d G:i:s', $completedDate)->addYears(1)->format('j F Y');
          if ($expiryDate >= Carbon::now()) {
                $expired = 1;
            }else {
                $expired = 0;
            };

            return view('your-car', compact('carsInformation', 'registration', 'expiryDate', 'expired'));
        }
        else {
          return redirect('/')->with('error', 'This registration was not found');  
        }

    }
}
