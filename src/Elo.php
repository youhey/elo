<?php

declare(strict_types=1);

namespace Youhey\Elo;

/**
 * Elo rating system
 */
class Elo
{
    /** @var int Default K Factor */
    private const DEFAULT_K_FACTOR = 16;

    /** @var int The K factor */
    private int $k;

    /**
     * constructor.
     *
     * @param int $k The K Factor
     */
    public function __construct(int $k = self::DEFAULT_K_FACTOR)
    {
        $this->k = $k;
    }

    /**
     * Calculate a new rating from the match result
     *
     * @param Match $match The match result
     */
    public function calculateMatch(Match $match): void
    {
        $player1 = $match->getPlayer();
        $player2 = $match->getOpponent();

        $result = $match->getResult();

        $calculationResult1 = $this->calculatePlayer($player1, $player2, $result);
        $calculationResult2 = $this->calculatePlayer($player2, $player1, (1.0 - $result));

        $player1->updateRating($calculationResult1);
        $player2->updateRating($calculationResult2);
    }

    /**
     * Calculate new player rating
     *
     * @param Player $player1
     * @param Player $player2
     * @param float $score
     *
     * @return CalculationResult
     */
    private function calculatePlayer(Player $player1, Player $player2, float $score): CalculationResult
    {
        $rating1 = $player1->getRating();
        $rating2 = $player2->getRating();

        $expected = $this->expectedScore($rating1, $rating2);
        $newRating = ($rating1 + ($this->k * ($score - $expected)));

        return new CalculationResult($newRating);
    }

    private function expectedScore(float $ratingA, float $ratingB): float
    {
        return (1.0 / (1.0 + (10.0 ** (($ratingB - $ratingA) / 400.0))));
    }
}
