<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 extends BaseTennisGame
{
    public function getScore(): string
    {
        return $this->scoreBoard;
    }
}
