<?php


namespace Elo;


class Player implements EloInterface
{
    /**
     * @var int
     */
    private $elo;

    /**
     * @var int
     */
    private $predictedResult;

    public function __construct(int $elo)
    {
        $this->elo = $elo;
    }

    /**
     * @return int
     */
    public function getElo(): int
    {
        return $this->elo;
    }
}
