<?php

namespace GildedRose;

class UpdateItemService
{
    public static function execute(Item $item): void
    {
        $strategy = new UpdateGenericItemStrategy();

        if ($item->name === 'Sulfuras, Hand of Ragnaros') {
            $strategy = new UpdateLegendaryItemStrategy();
        }

        if ($item->name === 'Aged Brie') {
            $strategy = new UpdateAgingItemStrategy();
        }

        if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
            $strategy = new UpdateBackstagePassesItemStrategy();
        }


        $strategy::update($item);
    }
}
