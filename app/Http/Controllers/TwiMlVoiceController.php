<?php

namespace App\Http\Controllers;

use App\src\StoryLine;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

/**
 * Class TwiMlVoiceController
 *
 * Handles voice calls from TwiMil server
 *
 * @package App\Http\Controllers
 */
class TwiMlVoiceController extends Controller
{
    /**
     * Welcomes the user and redirects them to play.
     *
     * @param Request $request
     */
    public function intro(Request $request)
    {
        $story = new StoryLine();
        return view('introduction')->with([
            'say_text' => $story->introduction(),
        ]);
    }

    /**
     * Returns a playing simulation that asks the user to enter a number.
     *
     * @return mixed
     */
    public function play()
    {
        $story = new StoryLine();
        return view('play')->with([
            'say_text' => $story->askForNumber()
        ]);
    }

    /**
     * Accepts the a user's digit input, verifies it, and returns the result.
     *
     * @param Request $request
     * @return mixed
     */
    public function result(Request $request)
    {
        return view('play')->with([
            'say_text' => "testing!"
        ]);
        $story = new StoryLine();
        $num = $request->get('Digits');
        $response = $story->runPhoneBuzz($num);

        if(empty($response))
            $this->error();

        return view('result')->with([
            'result_text' => $story->runPhoneBuzz($request->get('Digits'))
        ]);
    }

    /**
     * Returns an error message and asks for a number again.
     *
     * @return mixed
     */
    public function error()
    {
        $story = new StoryLine();
        $response = "I'm sorry, something went wrong." . $story->askForNumber();
        return view('play')->with([
            'say_text' => $response
        ]);
    }
}
