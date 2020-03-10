<?php

namespace Youhey\Elo\Test;

use PHPUnit\Framework\TestCase;
use Youhey\Elo\SimpleElo;
use Youhey\Elo\Match;
use Youhey\Elo\Player;

class SimpleEloTest extends TestCase
{
    public function testCalculateMatch(): void
    {
        $player1 = new Player(1500.0);
        $player2 = new Player(1700.0);

        $match = new Match($player1, $player2, 1.0, 0.0);

        $ratingSystem = new SimpleElo();
        $ratingSystem->calculateMatch($match);

        $this->assertEquals(1524, round($player1->getRating()));
        $this->assertEquals(1676, round($player2->getRating()));
    }
}
