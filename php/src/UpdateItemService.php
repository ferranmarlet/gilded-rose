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

        $strategy::update($item);
    }
}
