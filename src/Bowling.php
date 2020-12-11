<?php

namespace App;

class Bowling
{
    const FRAMES_PER_GAME = 10;

    private array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->rolls[$roll] + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->defaultFrameScore($roll) + $this->spareBonus($roll);

                $roll += 2;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            $roll += 2;

        }
        return $score;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * @param int $roll
     * @return int
     */
    public function defaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + ($this->rolls[$roll + 1] ?? 0);
    }

    /**
     * @param int $roll
     * @return int
     */
    public function strikeBonus(int $roll): int
    {
        return ($this->rolls[$roll + 1] ?? 0) + ($this->rolls[$roll + 2] ?? 0);
    }

    /**
     * @param int $roll
     * @return int
     */
    public function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2] ?? 0;
    }
}