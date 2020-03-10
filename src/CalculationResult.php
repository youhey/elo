<?php

declare(strict_types=1);

namespace Youhey\Elo;

/**
 * Calculation result
 */
class CalculationResult
{
    /** @var float A rating */
    private float $rating;

    /**
     * constructor.
     *
     * @param float $rating
     */
    public function __construct(float $rating)
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
}
