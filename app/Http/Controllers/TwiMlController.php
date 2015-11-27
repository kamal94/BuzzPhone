<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TwiMlController extends Controller
{
    /**
     * Handles voice calls from TwiMil server
     */
    public function voice(Request $request)
    {
        $content = View::make('home')->with('somevar', 3);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}
