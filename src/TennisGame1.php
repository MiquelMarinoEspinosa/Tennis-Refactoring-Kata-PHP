<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $firstPlayerScore = 0;

    private int $secondPlayerScore = 0;

    /**
     * @var array<string>
     */
    private const array SCORE_MESSAGE_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty'
    ];

    private int $minusResult {
        get => $this->firstPlayerScore - $this->secondPlayerScore;
    }

    public function __construct(
        private string $firstPlayer,
        private string $secondPlayer
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        $playerName === $this->firstPlayer
            ? $this->firstPlayerScore++
            : $this->secondPlayerScore++;
    }

    public function getScore(): string
    {
        if ($this->isDraw()) {
            if (isset(self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])) {
                return self::SCORE_MESSAGE_MAP[$this->firstPlayerScore] . '-All';
            }

            return match ($this->firstPlayerScore) {
                default => 'Deuce',
            };
        }

        if ($this->isEitherAdvantageOrWin()) {
            return match(true) {
                $this->minusResult === 1  => $this->advantageFor($this->firstPlayer),
                $this->minusResult === -1 => $this->advantageFor($this->secondPlayer),
                $this->minusResult >= 2   => $this->winFor($this->firstPlayer),
                default                   => $this->winFor($this->secondPlayer)
            };
        }

        return sprintf(
            '%s-%s',
            self::SCORE_MESSAGE_MAP[$this->firstPlayerScore] ?? 'Forty',
            self::SCORE_MESSAGE_MAP[$this->secondPlayerScore] ?? 'Forty'
        );
    }

    private function isDraw(): bool
    {
        return $this->firstPlayerScore === $this->secondPlayerScore;
    }

    private function isEitherAdvantageOrWin(): bool
    {
        return $this->firstPlayerScore >= 4 || $this->secondPlayerScore >= 4;
    }

    private function advantageFor(string $player): string
    {
        return sprintf('Advantage %s', $player);
    }

    private function winFor(string $player): string
    {
        return sprintf('Win for %s', $player);
    }
}
