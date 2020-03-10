# Elo Rating PHP

A PHP implements of [Elo rating system](http://en.wikipedia.org/wiki/Elo_rating_system).

## Installation

### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

```
php composer.phar require youhey/elo "~1.0.0"
```

or add

```
"youhey/elo": "~1.0.0"
```

to the require section of your `composer.json`

## Usage

Create two players with current ratings:

```php
use Youhey\Elo\Elo;
use Youhey\Elo\Match;
use Youhey\Elo\Player;

$elo = new Elo();

$player = new Player(1700.0);
$opponent = new Player(1650.0);

$match = new Match($player, $opponent, 1.0, 0.0);
$elo->calculateMatch($match);

$match = new Match($player, $opponent, 3.0, 2.0);
$elo->calculateMatch($match);

$newPlayerRating = $player->getRating();
$newOpponentRating = $opponent->getRating();
```

## Author

[Ikeda Youhei](https://github.com/youhey/), e-mail: [youhey.ikeda@gmail.com](mailto:youhey.ikeda@gmail.com)
