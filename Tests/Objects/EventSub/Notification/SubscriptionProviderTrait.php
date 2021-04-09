<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification;

use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Generator;

/**
 * Trait TestBroadcasterUserTrait
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream
 */
trait SubscriptionProviderTrait
{
    /**
     * @return Generator
     */
    public function provideSubscription()
    {
        $mock = new Subscription();

        yield [$mock];
    }
}
