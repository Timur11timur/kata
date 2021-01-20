<?php

use App\Tennis;
use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider scores
     */
    public function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new Tennis();

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointToPlayerOne();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->pointToPlayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }

    /** @test */
    public function it_scores_1_to_0()
    {
        $match = new Tennis();
        $match->pointToPlayerOne();

        $this->assertEquals('fifteen-love', $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [0, 1, 'love-fifteen'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [2, 1, 'thirty-fifteen'],
            [4, 0, 'Winner: Player 1'],
            [0, 4, 'Winner: Player 2'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: Player 1'],
            [4, 5, 'Advantage: Player 2'],
        ];
    }
}
