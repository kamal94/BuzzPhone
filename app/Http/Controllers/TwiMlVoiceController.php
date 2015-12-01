<?php

namespace App\Http\Controllers;

use App\src\StoryLine;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Services_Twilio;
use Symfony\Component\HttpFoundation\Request;
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
        $num = $request->get('Digits'); //get digits entered by user

        $response = $story->runPhoneBuzz(intval($num)); //get output of game.

        if($response[0] == 0)   //if there was an error, return the error message
            return $this->error($response[1]);

        //if no error, output the result of the game
        return view('result')->with([
            'say_text' => $response[1]
        ]);
    }

    /**
     * Returns an error message and asks for a number again.
     *
     * @return mixed
     */
    public function error($errorMessage)
    {
        $story = new StoryLine();
        $response = $errorMessage . $story->askForNumber();
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

    public function sendGame()
    {
        $phone = trim(Input::get('phone_number'));
        //check for malformed input.
        if(intval($phone) === 0)
            return view('welcome')->with(['error' => 'This is not a phone number']);
        if(strlen($phone) > 10)
            return view('welcome')->with(['error' => 'This phone number is too long. I can only call numbers in the USA']);
        if(strlen($phone) < 10)
            return view('welcome')->with(['error' => 'This is not a valid phone number. It is to short for me to understand']);


        $account_sid = env('ACCOUNT_SID');
        $auth_token = env('AUTH_TOKEN');
        $client = new Services_Twilio($account_sid, $auth_token);

        $client->account->calls->create('+17348384422', $phone, env('APP_URL').'/buzzphone/voice/initiateGame', array(
            'Method' => 'GET',
            'FallbackMethod' => 'GET',
            'StatusCallbackMethod' => 'GET',
            'Record' => 'false',
        ));
    }

    public function initiateGame()
    {
        $story = new StoryLine();
        return view('introduction')->with([
            'say_text' => 'Someone asked me to play a BuzzPhone game with you!',
        ]);
    }
}
