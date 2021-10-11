<?php

namespace GildasQ;

class BasketValorizer
{
    private const UNIT_PRICE = 800;

    public function valueOf(Basket $basket): int
    {
        if ($basket->equals(Basket::empty())) {
            return 0;
        }

        $total = $basket->countVolumes() * self::UNIT_PRICE;

        $promoRate = match($basket->countVolumes()) {
            2 => 0.95,
            3 => 0.9,
            4 => 0.8,
            5 => 0.75,
            default => 1,
        };

        return $total * $promoRate + $this->valueOf($basket->duplicateBooks());
    }
}
