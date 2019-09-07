<?php

use Elo\MatchFactory;
use Elo\SoloMatch;
use PHPUnit\Framework\TestCase;

final class SoloMatchTest extends TestCase
{
    /**
     * @dataProvider dpCalculateEstimatedWinningPercentage
     * @param SoloMatch $match
     * @param int $expected
     */
    public function test_elo_prediction(SoloMatch $match, int $expected)
    {
        $this->assertEquals($expected, $match->calculateExpectedResult());
    }

    public function dpCalculateEstimatedWinningPercentage()
    {
        return [
            "1500, 1500" => [MatchFactory::createFromElo(1500, 1500), 50],
            "200, 100" => [MatchFactory::createFromElo(200, 100), 64],
            "100, 200" => [MatchFactory::createFromElo(100, 200), 36],
            "2000, 1500" => [MatchFactory::createFromElo(2000, 1500), 95],
            "1500, 2000" => [MatchFactory::createFromElo(1500, 2000), 5],
        ];
    }
}
