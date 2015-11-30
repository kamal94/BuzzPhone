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
    public function introduction()
    {
        return "Hi, I'm Alice, doesn't it sound like a good day! ";
    }

    public function runPhoneBuzz($num)
    {
        if(empty($num) || !is_int($num) || $num < 1)
            return null;

        $response = "";

        for($i = 0; $i < $num; $i++) {
            if($this->isDivisibleByThreeAndFive($num)){
                $response .= "Fizz Buzz, ";
            } else if($this->isDivisibleByThree($num)) {
                $response .= "Fizz, ";
            } else if($this->isDivisibleByFive($num)) {
                $response .= "Buzz, ";
            } else {
                $response .= $num . ", ";
            }
        }

        return $response;
    }

    public function askForNumber()
    {
        return "Give me a number, and we can play BuzzPhone together!";
    }

    public function incorrectInput()
    {
        return "I can't play BuzzPhone like this." . $this->askForNumber();
    }

    public function isDivisibleByThreeAndFive($num)
    {
        return ($num % 3 === 0) && ($num % 5 === 0);
    }

    public function isDivisibleByThree($num)
    {
        return ($num % 3 === 0);
    }

    public function isDivisibleByFive($num)
    {
        return ($num % 5 === 0);
    }

}