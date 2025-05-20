<?php

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
