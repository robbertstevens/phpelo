<?php


namespace Elo;


class Player
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

    /**
     * @return int
     */
    public function getPredictedResult()
    {
        return $this->predictedResult;
    }

    /**
     * @param int $predictedResult
     * @return Player
     */
    public function setPredictedResult($predictedResult): self
    {
        $this->predictedResult = $predictedResult;

        return $this;
    }
}
