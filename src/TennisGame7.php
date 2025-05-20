<?php

namespace TennisGame;

class TennisGame7 extends TextTennisGame
{
    public function getScore(): string
    {
        return "Current score: " . $this->scoreBoard . ", enjoy your game!";
    }
}
