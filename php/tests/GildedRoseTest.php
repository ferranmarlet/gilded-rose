<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GenericItem;
use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\UpdateItemService;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testGenericItemPropertiesDecreaseWhenUpdated(): void
    {
        $item = new Item('foo', 5, 7);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, 4);
        $this->assertEquals($item->quality, 6);
    }

    public function testGenericItemQualityCannotGoBelowZero(): void
    {
        $item = new Item('foo', 0, 0);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 0);
    }

    public function testGenericItemQualityDecreasesDoubleWhenSellinIsZeroOrLess(): void
    {
        $item = new Item('foo', 0, 6);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 4);
    }

    public function testLegendaryItemPropertiesRemainTheSame(): void
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', -1, 80);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 80);
    }

    public function testAgingItemQualityIncreasesWhenUpdatedAndSellinIsPositive(): void
    {
        $item = new Item('Aged Brie', 2, 22);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, 1);
        $this->assertEquals($item->quality, 23);
    }

    public function testAgingItemQualityIncreasesByDoubleWhenUpdatedAndSellinIsNegative(): void
    {
        $item = new Item('Aged Brie', -4, 22);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, -5);
        $this->assertEquals($item->quality, 24);
    }

    public function testAgingItemQualityCannotGoAbove50(): void
    {
        $item = new Item('Aged Brie', -4, 49);
        UpdateItemService::execute($item);

        $this->assertEquals($item->sell_in, -5);
        $this->assertEquals($item->quality, 50);
    }
}
