<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use TennisGame\TennisGame1;

/**
 * TennisGame1 test case.
 */
class TennisGame1Test extends TestMaster
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->firstPlayer = 'Novak Djokovic';
        $this->secondPlayer = 'Rafa Nadal';

        $this->game = new TennisGame1(
            $this->firstPlayer,
            $this->secondPlayer
        );
    }

    #[DataProvider('data')]
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->seedScores($score1, $score2);
        $this->assertSame(
            $this->fixExpectedResultPlayersNames(
                $expectedResult
            ), $this->game->getScore()
        );
    }

    private function fixExpectedResultPlayersNames(
        string $expectedResult
    ): string {
        $fixedExpectedResult = str_replace(
            'player1',
            $this->firstPlayer,
            $expectedResult
        );

        return str_replace(
            'player2',
            $this->secondPlayer,
            $fixedExpectedResult
        );
    }
}
