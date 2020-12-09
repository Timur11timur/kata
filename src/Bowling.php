<?php

namespace App;

class Bowling
{
    const FRAMES_PER_GAME = 10;

    private array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
        if (($pins === 10) && ((count($this->rolls) % 2) === 1)) {
            if (count($this->rolls) < (self::FRAMES_PER_GAME * 2)) {
                $this->rolls[] = 0;
            }
        }
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            //check for a strike
            if ($this->rolls[$roll] === 10) {
                $score += $this->rolls[$roll];
                $score += $this->rolls[$roll + 2] ?? 0;
                $score += $this->rolls[$roll + 3] ?? 0;
                $roll++;
                $roll++;
            } else {
                //check for a spare
                if ($this->rolls[$roll] + ($this->rolls[$roll + 1] ?? 0) === 10) {
                    $score += $this->rolls[$roll + 2] ?? 0;
                }

                $score += $this->rolls[$roll] + ($this->rolls[$roll + 1] ?? 0);
                $roll++;
                $roll++;
            }
        }
        return $score;
    }
}