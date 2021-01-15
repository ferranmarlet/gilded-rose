<?php

namespace GildedRose;

class UpdateItemService
{
    public static function execute(Item $item): void
    {
        UpdateGenericItemStrategy::update($item);
    }
}
