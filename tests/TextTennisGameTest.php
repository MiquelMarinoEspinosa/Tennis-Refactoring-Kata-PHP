<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use TennisGame\TextTennisGame;

final class TextTennisGameTest extends TestMaster
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->game = new TextTennisGame(
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
            $expectedResult
        );
    }
}