<?php

namespace GildasQ;

class BasketValorizer
{
    private const UNIT_PRICE = 800;

    public function valueOf(Basket $basket): int
    {
        $total = $basket->countBooks() * self::UNIT_PRICE;

        $promoRate = match($basket->countVolumes()) {
            2 => 0.05,
            3 => 0.1,
            default => 0,
        };

        return $total - $total * $promoRate;
    }
}
