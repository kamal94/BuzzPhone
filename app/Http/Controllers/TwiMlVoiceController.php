<?php

namespace App\Http\Controllers;

use App\src\StoryLine;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
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
    public function intro()
    {
        $story = new StoryLine();
        return view('introduction')->with([
            'say_text' => $story->introduction(),
        ]);
    }

    /**
     * Returns a playing simulation that asks the user to enter a number.
     *
     * @return View
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
     * If user input verification is not passed, the user is redirected to
     * an error handling controller method.
     *
     * @param Request $request
     * @return mixed
     */
    public function result(\Illuminate\Http\Request $request)
    {
        $story = new StoryLine();
        $num = $request->get('Digits');

        $response = $story->runPhoneBuzz(intval($num));

        if(empty($response))
            return $this->error($num);

        return view('result')->with([
            'say_text' => $response
        ]);
    }

    /**
     * Returns an error message and asks for a number again.
     *
     * @return mixed
     */
    public function error($input)
    {
        $story = new StoryLine();
        $response = "I'm sorry, something went wrong." .
            'you entered' . $input . '. ' .$story->askForNumber();
        return view('play')->with([
            'say_text' => $response
        ]);
    }

    /**
     * Asks the user if they want to play again.
     *
     * @return View
     */
    public function end()
    {
        return view('end');
    }

    /*
     * A test contorller method.
     */
    public function test($num)
    {
        $story = new StoryLine();
        for($i = 0; $i < 20; $i++)
        {
            echo $story->introduction() . '<br>';
        }
    }
}
