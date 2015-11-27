<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TwiMlController extends Controller
{
    /**
     * Handles voice calls from TwiMil server
     */
    public function voice(Request $request)
    {
        dd($request);
    }
}
