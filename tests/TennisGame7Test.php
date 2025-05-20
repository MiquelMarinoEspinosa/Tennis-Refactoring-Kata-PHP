<?php

declare(strict_types=1);

namespace Tests;

use TennisGame\TennisGame7;
use PHPUnit\Framework\Attributes\DataProvider;

final class TennisGame7Test extends TestMaster
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->firstPlayer = $this->faker->name;
        $this->secondPlayer = $this->faker->name;

        $this->game = new TennisGame7(
            $this->firstPlayer,
            $this->secondPlayer
        );
    }

    #[DataProvider('data')]
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->assertScores(
            $score1,
            $score2,
            sprintf(
                "Current score: %s, enjoy your game!",
                $expectedResult
            )
        );
    }
}