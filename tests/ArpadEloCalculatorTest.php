<?php

use Elo\ArpadEloCalculator;
use Elo\MatchFactory;
use Elo\SoloMatch;
use PHPUnit\Framework\TestCase;

final class ArpadEloCalculatorTest extends TestCase
{
    /**
     * @dataProvider dpCalculateEstimatedWinningPercentage
     * @param int $eloA
     * @param int $eloB
     * @param int $expected
     */
    public function test_elo_prediction(int $eloA, int $eloB, int $expected)
    {
        $calculator = new ArpadEloCalculator();
        $this->assertEquals($expected, $calculator->calculateExpectedOutcomePercentage($eloA, $eloB));
    }

    public function dpCalculateEstimatedWinningPercentage()
    {
        return [
            "1500, 1500" => [1500, 1500, 50],
            "200, 100" => [200, 100, 64],
            "100, 200" => [100, 200, 36],
            "2000, 1500" => [2000, 1500, 95],
            "1500, 2000" => [1500, 2000, 5],
        ];
    }
}
