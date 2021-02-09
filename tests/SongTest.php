<?php

use App\Song;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    /** @test */
    public function ninety_nine_bottles_verse()
    {
        $expected = "99 bottles of beer on the wall
        99 bottles of beer
        Take one down and pass it around
        98 bottles of beer on the wall
        ";

        $result = (new Song)->verse(99);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function ninety_eight_bottles_verse()
    {
        $expected = "98 bottles of beer on the wall
        98 bottles of beer
        Take one down and pass it around
        97 bottles of beer on the wall
        ";

        $result = (new Song)->verse(98);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function two_bottle_verse()
    {
        $expected = "2 bottles of beer on the wall
        2 bottles of beer
        Take one down and pass it around
        1 bottle of beer on the wall
        ";

        $result = (new Song)->verse(2);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function one_bottle_verse()
    {
        $expected = "1 bottle of beer on the wall
        1 bottle of beer
        Take one down and pass it around
        No more bottles of beer on the wall
        ";

        $result = (new Song)->verse(1);

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function no_more_bottles_verse()
    {
        $expected = "No more bottles of beer on the wall
        No more bottles of beer
        Go to the store and buy some more
        99 bottles of beer on the wall
        ";

        $result = (new Song)->verse(0);

        $this->assertEquals($expected, $result);
    }


    /** @test */
    public function it_gets_the_lyrics()
    {
        $result = (new Song)->sing();
        $this->assertNotEmpty($result);
        echo $result;
    }
}
