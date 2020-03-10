<?php

namespace Youhey\Elo\Test;

use PHPUnit\Framework\TestCase;
use Youhey\Elo\Elo;
use Youhey\Elo\Match;
use Youhey\Elo\Player;

class EloTest extends TestCase
{
    public function testDefaultPlayer()
    {
        $player = new Player();

        $this->assertEquals(Player::DEFAULT_RATING, $player->getRating());
    }

    public function testCustomPlayer(): void
    {
        $player = new Player(1700.0);

        $this->assertEquals(1700.0, $player->getRating());
    }

    public function testCalculateMatch(): void
    {
        $player1 = new Player(1500.0);
        $player2 = new Player(1700.0);

        $match = new Match($player1, $player2, 1.0, 0.0);

        $ratingSystem = new Elo(32);
        $ratingSystem->calculateMatch($match);

        $this->assertEquals(1524, round($player1->getRating()));
        $this->assertEquals(1676, round($player2->getRating()));
    }
}
