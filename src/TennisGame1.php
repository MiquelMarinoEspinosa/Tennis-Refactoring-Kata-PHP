<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $m_score1 = 0;

    private int $m_score2 = 0;

    private int $minusResult {
        get => $this->m_score1 - $this->m_score2;
    }

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        $playerName === 'player1'
            ? $this->m_score1++
            : $this->m_score2++;
    }

    public function getScore(): string
    {
        if ($this->m_score1 === $this->m_score2) {
            return match ($this->m_score1) {
                0       => 'Love-All',
                1       => 'Fifteen-All',
                2       => 'Thirty-All',
                default => 'Deuce',
            };
        }

        if ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            return match(true) {
                $this->minusResult === 1  => 'Advantage player1',
                $this->minusResult === -1 => 'Advantage player2',
                $this->minusResult >= 2   => 'Win for player1',
                default                   => 'Win for player2'
            };
        }

        return $this->buildScore();
    }

    private function buildScore(): string
    {
        $score = '';

        $tempScore = $this->m_score1;

        for ($i = 1; $i < 3; $i++) {
            if ($i > 1) {
                $score .= '-';
                $tempScore = $this->m_score2;
            }

            $score .= $this->partialScore($tempScore);
        }

        return $score;
    }

    private function partialScore(int $tempScore): string
    {
        switch ($tempScore) {
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
            default:
                return '';
        }
    }
}
