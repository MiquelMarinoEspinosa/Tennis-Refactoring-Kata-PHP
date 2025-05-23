<?php

declare(strict_types=1);

namespace TennisGame;

final class Score
{
    private int $firstPlayer = 0;
    private int $secondPlayer = 0;

    private int $advantage {
        get => $this->firstPlayer - $this->secondPlayer;
    }

    public function pointForFirstPlayer(): void
    {
        $this->firstPlayer++;
    }

    public function pointForSecondPlayer(): void
    {
        $this->secondPlayer++;
    }

    public function isTie(): bool
    {
        return $this->firstPlayer === $this->secondPlayer;
    }

    public function isEndGame(): bool
    {
        return $this->firstPlayer >= 4 || $this->secondPlayer >= 4;
    }

    public function isAdvantageForFirstPlayer(): bool
    {
        return 1 === $this->advantage;
    }

    public function isAdvantageForSecondPlayer(): bool
    {
        return -1 === $this->advantage;
    }

    public function isWinForFirstPlayer(): bool
    {
        return $this->advantage >= 2;
    }

    public function firstPlayerScore(): int
    {
        return $this->firstPlayer;
    }

    public function secondPlayerScore(): int
    {
        return $this->secondPlayer;
    }
}
