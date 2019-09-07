<?php

use Elo\MatchFactory;
use Elo\Player;
use Elo\SoloMatch;
use PHPUnit\Framework\TestCase;

final class MatchFactoryTest extends TestCase
{
    /**
     * @dataProvider dpFromPlayerObjects
     * @param Player $playerA
     * @param Player $playerB
     */
    public function test_create_from_objects(Player $playerA, Player $playerB): void
    {
        $this->assertInstanceOf(
            SoloMatch::class,
            MatchFactory::createFromObjects($playerA, $playerB)
        );
    }

    /**
     * @dataProvider dpFromPlayerObjectsWithException
     * @param Player $playerA
     * @param Player $playerB
     */
    public function test_create_from_objects_with_typeerror_exception($playerA, $playerB): void
    {
        $this->expectException(TypeError::class);
        $this->assertInstanceOf(
            SoloMatch::class,
            MatchFactory::createFromObjects($playerA, $playerB)
        );
    }

    /**
     * @dataProvider dpFromElo
     * @param $eloA
     * @param $eloB
     */
    public function test_create_from_elo($eloA, $eloB): void
    {
        $this->assertInstanceOf(
            SoloMatch::class,
            MatchFactory::createFromElo($eloA, $eloB)
        );
    }

    /**
     * @dataProvider dpFromEloWithException
     * @param $eloA
     * @param $eloB
     */
    public function test_create_from_elo_with_typeerror_exception($eloA, $eloB): void
    {
        $this->expectException(TypeError::class);
        $this->assertInstanceOf(
            SoloMatch::class,
            MatchFactory::createFromElo($eloA, $eloB)
        );
    }

    public function dpFromPlayerObjects(): array
    {
        return [
            "two player objects with same MMR" => [new Player(1500), new Player(1500)],
            "two player objects with different MMR" => [new Player(1500), new Player(500)],
        ];
    }

    public function dpFromElo(): array
    {
        return [
            "two positive elo" => [1500, 1500],
            "two negative elo" => [-1500, -1500],
            "one negative elo and one positive elo" => [-1500, 1500],
        ];
    }

    public function dpFromEloWithException()
    {
        return [
            "null and positive elo" => [null, 1500],
            "null and null elo" => [null, null],
        ];
    }

    public function dpFromPlayerObjectsWithException()
    {
        return [
            "object and string" => ["1500", new Player(1500)],
            "object and integer" => [1500, new Player(1500)],
            "two strings" => ["1500", "1500"],
            "two integers" => [1500, 1500],
        ];
    }
}
