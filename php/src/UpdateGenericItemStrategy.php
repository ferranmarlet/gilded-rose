<?php

namespace GildedRose;

class UpdateGenericItemStrategy implements UpdateItemStrategyInterface
{
    public static function update(Item $item): void
    {
        if ($item->sell_in <= 0) {
            $item->quality -= 2;
        } else {
            $item->quality--;
        }

        $item->sell_in--;
    
        $item->quality = max(0, $item->quality);
    }
}
