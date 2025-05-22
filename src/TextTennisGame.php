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

    private object $score;

    private string $scoreBoard {
        get {
            if ($this->score->isTie()) {
                return $this->tie();
            }

            if ($this->score->isEndGame()) {
                return $this->endGame();
            }

            return $this->regularScore();
        }
    }

    public function __construct(
        public private(set) string $firstPlayer,
        public private(set) string $secondPlayer
    ) {
        $this->score = new class {
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
                return $this->advantage === 1;
            }

            public function isAdvantageForSecondPlayer(): bool
            {
                return $this->advantage === -1;
            }
        };
    }

    public function wonPoint(string $playerName): void
    {
        $playerName === $this->firstPlayer
            ? $this->score->pointForFirstPlayer()
            : $this->score->pointForSecondPlayer();

        $playerName === $this->firstPlayer
            ? $this->pointForFirstPlayer()
            : $this->pointForSecondPlayer();
    }

    public function getScore(): string
    {
        return $this->scoreBoard;
    }

    private function pointForFirstPlayer(): void
    {
        $this->firstPlayerScore++;
    }

    private function pointForSecondPlayer(): void
    {
        $this->secondPlayerScore++;
    }

    private function tie(): string
    {
        return isset(self::SCORE_MESSAGE_MAP[$this->firstPlayerScore()])
            ? sprintf('%s-All', self::SCORE_MESSAGE_MAP[$this->firstPlayerScore()])
            : 'Deuce';
    }

    private function endGame(): string
    {
        if ($this->score->isAdvantageForFirstPlayer()) {
            return $this->advantageForFirstPlayer();
        }

        if ($this->score->isAdvantageForSecondPlayer()) {
            return $this->advantageForSecondPlayer();
        }

        if ($this->isWinForFirstPlayer()) {
            return $this->winForFirstPlayer();
        }

        return $this->winForSecondPlayer();
    }

    private function isWinForFirstPlayer(): bool
    {
        return $this->minusResult >= 2;
    }

    private function advantageForFirstPlayer(): string
    {
        return $this->advantageFor($this->firstPlayer);
    }

    private function advantageForSecondPlayer(): string
    {
        return $this->advantageFor($this->secondPlayer);
    }

    private function winForFirstPlayer(): string
    {
        return $this->winFor($this->firstPlayer);
    }

    private function winForSecondPlayer(): string
    {
        return $this->winFor($this->secondPlayer);
    }

    private function advantageFor(string $player): string
    {
        return sprintf('Advantage %s', $player);
    }

    private function winFor(string $player): string
    {
        return sprintf('Win for %s', $player);
    }

    private function regularScore(): string
    {
        return sprintf(
            '%s-%s',
            $this->regularScoreForFirstPlayer(),
            $this->regularScoreForSecondPlayer()
        );
    }

    private function regularScoreForFirstPlayer(): string
    {
        return $this->regularScoreFor($this->firstPlayerScore());
    }

    private function regularScoreForSecondPlayer(): string
    {
        return $this->regularScoreFor($this->secondPlayerScore());
    }

    private function firstPlayerScore(): int
    {
        return $this->firstPlayerScore;
    }

    private function secondPlayerScore(): int
    {
        return $this->secondPlayerScore;
    }

    private function regularScoreFor(int $score): string
    {
        return self::SCORE_MESSAGE_MAP[$score] ?? 'Forty';
    }
}
