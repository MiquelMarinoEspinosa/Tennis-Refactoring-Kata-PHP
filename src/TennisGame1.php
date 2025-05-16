<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $firstPlayerScore = 0;

    private int $secondPlayerScore = 0;

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
        if ($this->isTheGameEqualized()) {
            return match ($this->firstPlayerScore) {
                0       => 'Love-All',
                1       => 'Fifteen-All',
                2       => 'Thirty-All',
                default => 'Deuce',
            };
        }

        if ($this->hasEitherPlayerMoreThanThreePoints()) {
            return match(true) {
                $this->minusResult === 1  => $this->advantageFor($this->firstPlayer),
                $this->minusResult === -1 => $this->advantageFor($this->secondPlayer),
                $this->minusResult >= 2   => $this->winFor($this->firstPlayer),
                default                   => $this->winFor($this->secondPlayer)
            };
        }

        return sprintf(
            '%s-%s',
            $this->partialScore($this->firstPlayerScore),
            $this->partialScore($this->secondPlayerScore)
        );
    }

    private function partialScore(int $score): string
    {
        return match($score) {
            0       => 'Love',
            1       => 'Fifteen',
            2       => 'Thirty',
            default => 'Forty'
        };
    }

    private function isTheGameEqualized(): bool
    {
        return $this->firstPlayerScore === $this->secondPlayerScore;
    }

    private function hasEitherPlayerMoreThanThreePoints(): bool
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
