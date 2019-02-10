<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MOTController extends Controller
{
    public function results(Request $request)
    {
    	$registration = $request->input('registration');
    	$dvsaToken = env("DVSA_TOKEN");
        $headers = ['x-api-key' => $dvsaToken, 'Accept' => 'application/json+v2'];

    	// $client = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), 'header' => $headers ));

    	$client = new \GuzzleHttp\Client(['headers' => $headers]);

    	$response = $client->request('GET', 'http://beta.check-mot.service.gov.uk/trade/vehicles/mot-tests?registration='. $registration);

    	$carsInformation = (json_decode((string) $response->getBody()));

        return view('car', compact('carsInformation', 'registration'));
    }
}
