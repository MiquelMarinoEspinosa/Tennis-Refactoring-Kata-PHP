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
            if ($this->isTie()) {
                return $this->tie();
            }

            if ($this->isEndGame()) {
                return $this->endGame();
            }

            return $this->regularScore();
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

    private function isTie(): bool
    {
        return $this->firstPlayerScore === $this->secondPlayerScore;
    }

    private function tie(): string
    {
        return isset(self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            ? sprintf('%s-All', self::SCORE_MESSAGE_MAP[$this->firstPlayerScore])
            : 'Deuce';
    }

    private function isEndGame(): bool
    {
        return $this->firstPlayerScore >= 4 || $this->secondPlayerScore >= 4;
    }

    private function endGame(): string
    {
        return match(true) {
            $this->isAdvantageForFirstPlayer() => $this->advantageForFirstPlayer(),
            $this->isAdvantageForSecondPlayer() => $this->advantageForSecondPlayer(),
            $this->isWinForFirstPlayer() => $this->winForFirstPlayer(),
            default => $this->winForSecondPlayer()
        };
    }

    private function isAdvantageForFirstPlayer(): bool
    {
        return $this->minusResult === 1;
    }

    private function isAdvantageForSecondPlayer(): bool
    {
        return $this->minusResult === -1;
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
            $this->regularScoreFor($this->firstPlayerScore),
            $this->regularScoreFor($this->secondPlayerScore)
        );
    }

    private function regularScoreFor(int $score): string
    {
        return self::SCORE_MESSAGE_MAP[$score] ?? 'Forty';
    }
}
