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
                0 => 'Love-All',
                1 => 'Fifteen-All',
                2 => 'Thirty-All',
                default => 'Deuce',
            };
        } elseif ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            if ($this->minusResult === 1) {
                return 'Advantage player1';
            } elseif ($this->minusResult === -1) {
                return 'Advantage player2';
            } elseif ($this->minusResult >= 2) {
                return 'Win for player1';
            } else {
                return 'Win for player2';
            }
        } else {
            return $this->buildScore();
        }
    }

    private function buildScore(): string
    {
        $score = '';

        for ($i = 1; $i < 3; $i++) {
            if ($i === 1) {
                $tempScore = $this->m_score1;
            } else {
                $score .= '-';
                $tempScore = $this->m_score2;
            }
            switch ($tempScore) {
                case 0:
                    $score .= 'Love';
                    break;
                case 1:
                    $score .= 'Fifteen';
                    break;
                case 2:
                    $score .= 'Thirty';
                    break;
                case 3:
                    $score .= 'Forty';
                    break;
            }
        }

        return $score;
    }
}
