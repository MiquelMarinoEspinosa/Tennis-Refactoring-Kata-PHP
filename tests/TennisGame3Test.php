<?php

declare(strict_types=1);

namespace Tests;

use TennisGame\TennisGame3;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * TennisGame1 test case.
 */
class TennisGame3Test extends TestMaster
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->firstPlayer = $this->faker->name;
        $this->secondPlayer = $this->faker->name;

        $this->game = new TennisGame3(
            $this->firstPlayer,
            $this->secondPlayer
        );
    }

    #[DataProvider('data')]
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->assertScores($score1, $score2, $expectedResult);
    }
}
