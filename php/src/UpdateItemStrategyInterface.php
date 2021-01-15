<?php

namespace GildedRose;

interface UpdateItemStrategyInterface
{
    public static function update(Item $item): void;
}
