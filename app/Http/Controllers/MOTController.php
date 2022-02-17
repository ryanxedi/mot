<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use DateTime;
use Carbon\Carbon;

class MOTController extends Controller
{
  public function results(Request $request)
  {
    $registration = $request->registration;

    $response = Http::withHeaders(['x-api-key' => env('DVSA_TOKEN')])
      ->accept('application/json')
      ->get('http://beta.check-mot.service.gov.uk/trade/vehicles/mot-tests', ['registration' => $registration]);
      
    if ($response->ok()) {
      $carsInformation = $response->json()[0];
      $completedDate = Carbon::createFromFormat('Y.m.d G:i:s', $carsInformation['motTests'][0]['completedDate']);
      $expiryDateFormat = $completedDate->addYears(1);

      if (Carbon::now() >= $expiryDateFormat) {
        $expiryDate = $expiryDateFormat->format('j F Y');
        $expired = 1;
      } else {
        $expiryDate = $expiryDateFormat->format('j F Y');
        $expired = 0;
      }
      return view('your-car', compact('carsInformation', 'registration', 'expiryDate', 'expiryDateFormat', 'expired'));
    } else {
      return back()->with('error', 'This registration was not found');  
    }
  }
}