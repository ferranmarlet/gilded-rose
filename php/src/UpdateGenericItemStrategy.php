<?php

namespace GildedRose;

class UpdateGenericItemStrategy implements UpdateItemStrategyInterface
{
    public static function update(Item $item): void
    {
        if ($item->name !== 'Aged Brie' and $item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
            if ($item->quality > 0) {
                if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                    $item->quality--;
                }
            }
        } else {
            if ($item->quality < 50) {
                $item->quality++;
                if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }
                }
            }
        }

        if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
            $item->sell_in--;
        }

        if ($item->sell_in < 0) {
            if ($item->name !== 'Aged Brie') {
                if ($item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->quality > 0) {
                        if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                            $item->quality--;
                        }
                    }
                } else {
                    $item->quality = 0;
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality++;
                }
            }
        }
    }
}
