<?php

namespace GildedRose;

class UpdateBackstagePassesItemStrategy implements UpdateItemStrategyInterface
{
    public static function update(Item $item): void
    {
        if ($item->sell_in > 10) {
            $item->quality++;
        } elseif ($item->sell_in > 5) {
            $item->quality += 2;
        } elseif ($item->sell_in > 0) {
            $item->quality += 3;
        } else {
            $item->quality = 0;
        }

        $item->sell_in--;

        $item->quality = min(50, $item->quality);
    }
}
