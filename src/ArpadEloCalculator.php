<?php

namespace Elo;

class ArpadEloCalculator
{
    public function calculatorExpectedResult(int $eloA, int $eloB): int
    {
        return round(1 / (10 ** (($eloA - $eloB) / 400) + 1) * 100);
    }
}
