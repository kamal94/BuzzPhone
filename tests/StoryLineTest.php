<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoryLineTest extends TestCase
{

    public function testDivisibleByThree()
    {
        $story = new \App\src\StoryLine();
        $this->assertTrue( $story->isDivisibleByThree(3));
        $this->assertTrue( $story->isDivisibleByThree(9));
        $this->assertTrue( $story->isDivisibleByThree(6));
        $this->assertFalse( $story->isDivisibleByThree(2));
        $this->assertFalse( $story->isDivisibleByThree(4));
        $this->assertFalse( $story->isDivisibleByThree(null));
    }

    public function testDivisibleByFive()
    {
        $story = new \App\src\StoryLine();

        $this->assertTrue(true, $story->isDivisibleByFive(5));
        $this->assertTrue(true, $story->isDivisibleByFive(10));
        $this->assertFalse( $story->isDivisibleByFive(2));
        $this->assertFalse( $story->isDivisibleByFive(21));
        $this->assertFalse( $story->isDivisibleByFive(3));
        $this->assertFalse( $story->isDivisibleByFive(null));

    }

    public function testDivisibleByFiveAndThree()
    {
        $story = new \App\src\StoryLine();

        $this->assertTrue(true, $story->isDivisibleByThreeAndFive(15));
        $this->assertTrue(true, $story->isDivisibleByThreeAndFive(30));
        $this->assertTrue(true, $story->isDivisibleByThreeAndFive(35));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(3));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(5));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(10));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(12));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(42));
        $this->assertFalse( $story->isDivisibleByThreeAndFive(null));

    }
}
