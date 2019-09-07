<?php

namespace Elo;

class SoloMatch {

    /**
     * @var Player
     */
    private $a;
    /**
     * @var Player
     */
    private $b;

    /**
     * @var ArpadEloCalculator
     */
    private $calculator;

    public function __construct(EloInterface $a, EloInterface $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->calculator = new ArpadEloCalculator();
    }

    public function calculateExpectedResult()
    {
        $eloA = $this->getA()->getElo();
        $eloB = $this->getB()->getElo();

        return $this->calculator->calculateExpectedOutcomePercentage($eloA, $eloB);
    }

    /**
     * @return Player
     */
    public function getA(): Player
    {
        return $this->a;
    }

    /**
     * @return Player
     */
    public function getB(): Player
    {
        return $this->b;
    }

    public function calculateEloForPlayerA(int $result)
    {
        return $this->calculator->calculateNewEloRating($this->getA()->getElo(), $this->getB()->getElo(), $result);
    }

    public function calculateEloForPlayerB(int $result)
    {
        return $this->calculator->calculateNewEloRating($this->getB()->getElo(), $this->getA()->getElo(), $result);
    }
}
