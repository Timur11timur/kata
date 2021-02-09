<?php

namespace App;

use App\GildedRose\Backstage;
use App\GildedRose\Brie;
use App\GildedRose\Item;
use App\GildedRose\Sulfuras;

class GildedRose
{
    private static $items = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
    ];


    public static function of($name, $quality, $sellIn)
    {
        if (! array_key_exists($name, self::$items)) {
            throw new \InvalidArgumentException('Item type does not exist.');
        }

        $class = self::$items[$name];

        return new $class($quality, $sellIn);
    }
}