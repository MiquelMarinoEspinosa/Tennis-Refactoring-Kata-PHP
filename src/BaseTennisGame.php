<?php

declare(strict_types=1);

namespace TennisGame;

abstract class BaseTennisGame implements TennisGame
{
    protected int $firstPlayerScore = 0;

    protected int $secondPlayerScore = 0;

    protected int $minusResult {
        get => $this->firstPlayerScore - $this->secondPlayerScore;
    }

    public function __construct(
        public private(set) string $firstPlayer,
        public private(set) string $secondPlayer
    ) {
    }
}
