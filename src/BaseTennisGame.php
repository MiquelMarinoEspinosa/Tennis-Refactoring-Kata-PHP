<?php

declare(strict_types=1);

namespace TennisGame;

abstract class BaseTennisGame
{
    protected int $firstPlayerScore = 0;

    protected int $secondPlayerScore = 0;

    protected int $minusResult {
        get => $this->firstPlayerScore - $this->secondPlayerScore;
    }
}
