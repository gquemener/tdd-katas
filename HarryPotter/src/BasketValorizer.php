<?php

namespace GildasQ;

class BasketValorizer
{
    private const UNIT_PRICE = 800;

    public function valueOf(Basket $basket): int
    {
        if (1 === $basket->countBooks()) {
            return $basket->countBooks() * self::UNIT_PRICE;
        }

        $total = $basket->countBooks() * self::UNIT_PRICE;

        return $total - $total * 0.05;
    }
}
