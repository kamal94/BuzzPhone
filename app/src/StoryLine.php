<?php
/**
 * Created by PhpStorm.
 * User: Kamal
 * Date: 11/28/15
 * Time: 1:35 PM
 */

namespace App\src;


class StoryLine
{
    // a list of greetings
    static $greetings = [
        "Hi, I'm Alice, doesn't it sound like a good day! ",
        "Hi, I'm Alice, I can't wait to play with you! ",
        "Hi, I'm Alice, did you notice how beautiful the sky is today? ",
        "Hi, I'm Alice, I like your phone number! ",
        "Hi, I'm Alice, I wonder what we will do today! ",
        "Hi, I'm Alice, I'm so glad you called...I was beginning to fall asleep! ",
        "Hi, I'm Alice, you finally called! ",
        "Hi, I'm Alice, I really like to play games over the phone! ",
        "Hi, I'm Alice, I really like to play BuzzPhone! ",

    ];

    /**
     * Returns a random greeting.
     *
     * @return string A greeting from a list of arrays
     */
    public function introduction()
    {
        $rand = rand(0,8);
        return StoryLine::$greetings[$rand];
    }

    /**
     * Returns the output of the FizzBuzz game. From 1 to the passed number,
     * a count is returned, where if each number is divisible by three, "fizz" takes
     * its place, and if it's divisible by five, "buzz" is returned, and if it's
     * divisible by both three and five, "fizzbuzz" is returned in place of the number
     * in the string.
     *
     * @param $num  int the number to which to count from 1
     * @return array  An array of length 2. The first index is either 1 or 0. If 0, then an error
     *      occurred. If 1, then no error occurred. In both cases, there will either an error message
     *      in the second index, or the output of the game.
     */
    public function runPhoneBuzz($num)
    {
        if(empty($num))
            return [0, "You didn't enter any number. "];
        if(!is_int($num))
            return [0, "What you entered was not a number. "];
        if($num < 1)
            return [0, "Please enter a number above zero. "];
        if($num > 50)
            return [0, "That number is too big for me. Please enter a number between 1 and 50. "];

        $response = "";

        //count from 1 and check for fizz and buzzes
        for($i = 1; $i <= $num; $i++) {
            if($this->isDivisibleByThreeAndFive($i)){
                $response .= "Fizz Buzz, ";
            } else if($this->isDivisibleByThree($i)) {
                $response .= "Fizz, ";
            } else if($this->isDivisibleByFive($i)) {
                $response .= "Buzz, ";
            } else {
                $response .= $i . ", ";
            }
        }

        return [1,$response];   //if no error, output with result 1 and response message in array
    }

    /**
     * Returns a stirng asking for a number
     * @return string
     */
    public function askForNumber()
    {
        return "Give me a number, and we can play BuzzPhone together!";
    }

    /**
     * Returns a string that says the input is incorrect and asks for a new number
     * @return string
     */
    public function incorrectInput()
    {
        return "I can't play BuzzPhone like this." . $this->askForNumber();
    }

    /**
     * Returns true if the passed number is divisible by three
     * and five.
     *
     * @param $num  int
     * @return bool false if not divisible by three and five, or is null. true
     *      otherwise
     */
    public function isDivisibleByThreeAndFive($num)
    {
        if(empty($num))
            return false;
        return (($num % 3) === 0) && ($num % 5 === 0);
    }


    /**
     * Returns true if the passed number is divisible by three.
     *
     * @param $num  int
     * @return bool false if not divisible by three, or is null. true
     *      otherwise
     */
    public function isDivisibleByThree($num)
    {
        if(empty($num))
            return false;
        return (($num % 3)=== 0);
    }


    /**
     * Returns true if the passed number is divisible by five.
     *
     * @param $num  int
     * @return bool false if not divisible by five, or is null. true
     *      otherwise
     */
    public function isDivisibleByFive($num)
    {
        if(empty($num))
            return false;
        return (($num % 5) === 0);
    }

}