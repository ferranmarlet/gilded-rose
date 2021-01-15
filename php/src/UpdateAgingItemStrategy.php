<?php

namespace GildedRose;

class UpdateAgingItemStrategy implements UpdateItemStrategyInterface
{
    public static function update(Item $item): void
    {
        if ($item->sell_in > 0) {
            $item->quality++;
        } else {
            $item->quality += 2;
        }

        $item->sell_in--;

        $item->quality = min(50, $item->quality);
    }
}
