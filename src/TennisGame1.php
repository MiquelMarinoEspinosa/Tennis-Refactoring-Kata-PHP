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
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        $playerName === 'player1'
            ? $this->firstPlayerScore++
            : $this->secondPlayerScore++;
    }

    public function getScore(): string
    {
        if ($this->firstPlayerScore === $this->secondPlayerScore) {
            return match ($this->firstPlayerScore) {
                0       => 'Love-All',
                1       => 'Fifteen-All',
                2       => 'Thirty-All',
                default => 'Deuce',
            };
        }

        if ($this->firstPlayerScore >= 4 || $this->secondPlayerScore >= 4) {
            return match(true) {
                $this->minusResult === 1  => 'Advantage player1',
                $this->minusResult === -1 => 'Advantage player2',
                $this->minusResult >= 2   => 'Win for player1',
                default                   => 'Win for player2'
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
}
