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

}
