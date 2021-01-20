<?php

namespace App;

class Tennis
{
    private $playerOnePoints = 0;

    private $playerTwoPoints = 0;

    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf('%s-%s',
            $this->pointsToTerm($this->playerOnePoints),
            $this->pointsToTerm($this->playerTwoPoints)
        );
    }

    public function pointToPlayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoPoints++;
    }

    private function pointsToTerm($points)
    {
        switch ($points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }

    private function hasWinner(): bool
    {
        if (($this->playerTwoPoints > 3) && ($this->playerTwoPoints >= ($this->playerOnePoints + 2))) {
            return true;
        }

        if (($this->playerOnePoints > 3) && ($this->playerOnePoints >= ($this->playerTwoPoints + 2))) {
            return true;
        }

        return false;
    }

    private function isDeuce(): bool
    {
        if ($this->canBeWon() && ($this->playerOnePoints == $this->playerTwoPoints)) {
            return true;
        }

        return false;
    }

    private function hasAdvantage(): bool
    {
        if ($this->canBeWon()) {
            return !$this->isDeuce();
        }

        return false;
    }

    private function canBeWon(): bool
    {
        return ($this->playerOnePoints > 2) && ($this->playerTwoPoints > 2);
    }

    private function leader(): string
    {
        return ($this->playerOnePoints > $this->playerTwoPoints) ? 'Player 1' : 'Player 2';
    }
}