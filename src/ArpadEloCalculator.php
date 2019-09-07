<?php

namespace Elo;

class ArpadEloCalculator
{
    public const MATCH_WIN = 1;
    public const MATCH_TIE = 0.5;
    public const MATCH_LOSE = 0;

    public const ELO_SCORE_ESTIMATION = 400;

    public function calculateExpectedOutcomePercentage(int $eloA, int $eloB): int
    {
        return round($this->calculateExpectedOutcome($eloA, $eloB) * 100);
    }

    public function calculateNewEloRating(int $eloA, int $eloB, $result): int
    {
        $k = $this->calculateKFactor();
        $expectedOutcome = $this->calculateExpectedOutcome($eloA, $eloB);

        return round($eloA + $k * ($result - $expectedOutcome));
    }

    private function calculateExpectedOutcome(int $eloA, int $eloB)
    {
        $x = $eloA - $eloB;

        $exponent = -($x / self::ELO_SCORE_ESTIMATION);

        return 1 / (1 + 10 ** $exponent);
    }

    private function calculateKFactor()
    {
        return 20;
    }
}
