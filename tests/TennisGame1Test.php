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
        $this->game = new TennisGame1('player1', 'player2');
    }

    #[DataProvider('data')]
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->seedScores($score1, $score2);
        $this->assertSame($expectedResult, $this->game->getScore());
    }
}
