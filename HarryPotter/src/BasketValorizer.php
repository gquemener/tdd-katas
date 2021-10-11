<?php

namespace GildasQ;

class BasketValorizer
{
    private const UNIT_PRICE = 800;

    public function valueOf(Basket $basket): int
    {
        $total = $basket->countVolumes() * self::UNIT_PRICE;

        $promoRate = match($basket->countVolumes()) {
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            default => 0,
        };

        return $total - $total * $promoRate + (($basket->countBooks() - $basket->countVolumes()) * self::UNIT_PRICE);
    }
}
