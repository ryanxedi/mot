<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;


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
            return view('your-car', compact('carsInformation', 'registration'));
        }
        else {
          return redirect('/')->with('error', 'This registration was not found');  
        }

    }
}
