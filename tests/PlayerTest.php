<?php

namespace Youhey\Elo\Test;

use PHPUnit\Framework\TestCase;
use Youhey\Elo\Elo;
use Youhey\Elo\Match;
use Youhey\Elo\Player;

class PlayerTest extends TestCase
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
}
