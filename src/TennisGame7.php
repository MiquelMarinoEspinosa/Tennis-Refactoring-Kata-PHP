<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame7 extends TextTennisGame
{
    public function getScore(): string
    {
        return sprintf(
            "Current score: %s, enjoy your game!",
            $this->scoreBoard
        );
    }
}
