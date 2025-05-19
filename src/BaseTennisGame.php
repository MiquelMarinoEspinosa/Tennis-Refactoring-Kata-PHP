<?php

declare(strict_types=1);

namespace TennisGame;

abstract class BaseTennisGame implements TennisGame
{
    /**
     * @var array<string>
     */
    protected const array SCORE_MESSAGE_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty'
    ];

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

    public function wonPoint(string $playerName): void
    {
        $playerName === $this->firstPlayer
            ? $this->firstPlayerScore++
            : $this->secondPlayerScore++;
    }

    protected function isDraw(): bool
    {
        return $this->firstPlayerScore === $this->secondPlayerScore;
    }

    protected function draw(): string
    {
        return isset(self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            ? sprintf('%s-All', self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            : 'Deuce';
    }

    protected function isAdvantageOrWin(): bool
    {
        return $this->firstPlayerScore >= 4 || $this->secondPlayerScore >= 4;
    }

    protected function advantageFor(string $player): string
    {
        return sprintf('Advantage %s', $player);
    }

    protected function winFor(string $player): string
    {
        return sprintf('Win for %s', $player);
    }
}
