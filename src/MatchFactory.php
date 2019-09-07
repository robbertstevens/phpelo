<?php

namespace Elo;

class MatchFactory
{
    public static function createFromObjects(Player $a, Player $b)
    {
        return new SoloMatch($a, $b);
    }

    public static function createFromElo(int $a, int $b)
    {
        return new SoloMatch(new Player($a), new Player($b));
    }
}
