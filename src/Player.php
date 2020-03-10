<?php

declare(strict_types=1);

namespace Youhey\Elo;

/**
 * Player rating
 */
class Player
{
    /** @var float Default rating */
    public const DEFAULT_RATING = 1500.0;

    /** @var float A rating */
    private float $rating;

    /**
     * constructor.
     *
     * @param float $rating A rating
     */
    public function __construct(float $rating = self::DEFAULT_RATING)
    {
        $this->rating = $rating;
    }

    /**
     * Get a rating
     *
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * Update the rating from the calculation result
     *
     * @param CalculationResult $calculationResult
     */
    public function updateRating(CalculationResult $calculationResult): void
    {
        $this->rating = $calculationResult->getRating();
    }
}
