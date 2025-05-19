<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 extends BaseTennisGame
{
    private string $scoreBoard {
        get {
            if ($this->isDraw()) {
                return $this->draw();
            }

            if ($this->isAdvantageOrWin()) {
                return $this->advantageOrWin();
            }

            return $this->playersScore();
        }
    }

    public function getScore(): string
    {
        return $this->scoreBoard;
    }

    private function playersScore(): string
    {
        return sprintf(
            '%s-%s',
            $this->playerScore($this->firstPlayerScore),
            $this->playerScore($this->secondPlayerScore)
        );
    }
}
