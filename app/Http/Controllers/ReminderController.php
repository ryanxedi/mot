<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
  public function reminder(Request $request)
  {
    $request->validate([
        'email' => 'email',
        'registration' => 'required',
        'expires' => 'required'
    ]);

    Reminder::create([
        'email' => $request->email,
        'registration' => $request->registration,
        'expires' => $request->expires
    ]);

    return back()->with('status', 'You will be notified a month before your MOT is due');
  }
}
