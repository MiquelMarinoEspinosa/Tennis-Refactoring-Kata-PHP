<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use TennisGame\LastTextTennisGame;

final class LastTextTennisGameTest extends TestMaster
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->game = new LastTextTennisGame(
            $this->faker->name,
            $this->faker->name
        );
    }

    #[DataProvider('data')]
    public function testScores(
        int $score1,
        int $score2,
        string $expectedResult
    ): void {
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