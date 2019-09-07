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

    public function __construct(Player $a, Player $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->calculator = new ArpadEloCalculator();
    }

    public function calculateExpectedResult()
    {
        $eloA = $this->getA()->getElo();
        $eloB = $this->getB()->getElo();

        return $this->calculator->calculatorExpectedResult($eloA, $eloB);
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
}
