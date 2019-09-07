<?php

require "vendor/autoload.php";

use Elo\MatchFactory;
use Elo\Player;

$match = MatchFactory::createFromObjects(new Player(1515), new Player(1515));


echo $match->calculateExpectedResult();
