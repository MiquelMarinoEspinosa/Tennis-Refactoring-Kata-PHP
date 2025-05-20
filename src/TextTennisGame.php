<?php

declare(strict_types=1);

namespace TennisGame;

class TextTennisGame implements TennisGame
{
    /**
     * @var array<string>
     */
    private const array SCORE_MESSAGE_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty'
    ];

    private int $firstPlayerScore = 0;

    private int $secondPlayerScore = 0;

    private int $minusResult {
        get => $this->firstPlayerScore - $this->secondPlayerScore;
    }

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

    public function getScore(): string
    {
        return $this->scoreBoard;
    }

    private function isDraw(): bool
    {
        return $this->firstPlayerScore === $this->secondPlayerScore;
    }

    private function draw(): string
    {
        return isset(self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            ? sprintf('%s-All', self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            : 'Deuce';
    }

    private function isAdvantageOrWin(): bool
    {
        return $this->firstPlayerScore >= 4 || $this->secondPlayerScore >= 4;
    }

    private function advantageOrWin(): string
    {
        return match(true) {
            $this->minusResult === 1  => $this->advantageFor($this->firstPlayer),
            $this->minusResult === -1 => $this->advantageFor($this->secondPlayer),
            $this->minusResult >= 2   => $this->winFor($this->firstPlayer),
            default                   => $this->winFor($this->secondPlayer)
        };
    }

    private function advantageFor(string $player): string
    {
        return sprintf('Advantage %s', $player);
    }

    private function winFor(string $player): string
    {
        return sprintf('Win for %s', $player);
    }

    private function playersScore(): string
    {
        return sprintf(
            '%s-%s',
            $this->playerScore($this->firstPlayerScore),
            $this->playerScore($this->secondPlayerScore)
        );
    }

    private function playerScore(int $scoreBoard): string
    {
        return self::SCORE_MESSAGE_MAP[$scoreBoard] ?? 'Forty';
    }
}
