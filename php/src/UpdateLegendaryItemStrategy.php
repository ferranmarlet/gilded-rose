<?php

namespace GildedRose;

class UpdateLegendaryItemStrategy implements UpdateItemStrategyInterface
{
    public static function update(Item $item): void
    {
        // Legendary items are soo cool they don't change quality
    }
}
