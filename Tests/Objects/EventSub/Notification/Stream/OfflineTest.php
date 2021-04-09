<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\Stream;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream\Offline;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\SubscriptionProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

class OfflineTest extends TestCase
{
    use TestFakerTrait, SubscriptionProviderTrait;

    /**
     * @dataProvider provideSubscription
     * @param mixed $subscription
     */
    public function testGetSetSubscription($subscription)
    {
        $offline = new Offline();
        $this->assertNull($offline->getSubscription());
        $this->assertInstanceOf(Offline::class, $offline->setSubscription(null));
        $this->assertNull($offline->getSubscription());
        $this->assertInstanceOf(Offline::class, $offline->setSubscription($subscription));
        $this->assertEquals($subscription, $offline->getSubscription());
        $this->assertInstanceOf(Subscription::class, $offline->getSubscription());
    }

    /**
     * @dataProvider provideEvent
     * @param mixed $event
     */
    public function testGetSetEvent($event)
    {
        $offline = new Offline();
        $this->assertNull($offline->getEvent());
        $this->assertInstanceOf(Offline::class, $offline->setEvent(null));
        $this->assertNull($offline->getEvent());
        $this->assertInstanceOf(Offline::class, $offline->setEvent($event));
        $this->assertEquals($event, $offline->getEvent());
        $this->assertInstanceOf(EventInterface::class, $offline->getEvent());
    }

    /**
     * @return Generator
     */
    public function provideEvent()
    {
        $this->setupFaker();

        $mock = $this
            ->getMockBuilder(EventInterface::class)
            ->getMock();

        yield [$mock];
    }
}
