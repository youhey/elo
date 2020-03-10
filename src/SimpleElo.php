<?php

declare(strict_types=1);

namespace Youhey\Elo;

/**
 * A simplified pseudo Elo rating system
 */
class SimpleElo
{
    /**
     * Calculate a new rating from the match result
     *
     * @param Match $match The match result
     */
    public function calculateMatch(Match $match): void
    {
        $player1 = $match->getPlayer();
        $player2 = $match->getOpponent();

        $score = $match->getResult();

        $rating1 = $player1->getRating();
        $rating2 = $player2->getRating();

        $v = $this->v($rating1, $rating2);

        $op1 = $this->op($score);
        $op2 = $this->op((1.0 - $score));

        $calculationResult1 = new CalculationResult(($rating1 + ($v * $op1)));
        $calculationResult2 = new CalculationResult(($rating2 + ($v * $op2)));

        $player1->updateRating($calculationResult1);
        $player2->updateRating($calculationResult2);
    }

    private function v(float $ratingA, float $ratingB): float
    {
        $v = ((($ratingB - $ratingA) * 0.04) + 16.0);

        if ($v >= 31.0) {
            return 31.0;
        }
        if ($v <= 1.0) {
            return 1.0;
        }

        return $v;
    }

    private function op(float $score): float
    {
        if ($score === 0.0) {
            return -1.0;
        }
        return $score;
    }
}
