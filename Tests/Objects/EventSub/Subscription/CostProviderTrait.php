<?php


namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription;


use Generator;

/**
 * Trait CostProviderTrait
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription
 */
trait CostProviderTrait
{
    /**
     * @return Generator
     */
    public function provideCost()
    {
        foreach (range(0, 10) as $number) {
            yield [$number];
        }
    }
}