<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\Stream;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream\Online;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\SubscriptionProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

class OnlineTest extends TestCase
{
    use TestFakerTrait, SubscriptionProviderTrait;

    /**
     * @dataProvider provideSubscription
     * @param mixed $subscription
     */
    public function testGetSetSubscription($subscription)
    {
        $online = new Online();
        $this->assertNull($online->getSubscription());
        $this->assertInstanceOf(Online::class, $online->setSubscription(null));
        $this->assertNull($online->getSubscription());
        $this->assertInstanceOf(Online::class, $online->setSubscription($subscription));
        $this->assertEquals($subscription, $online->getSubscription());
        $this->assertInstanceOf(Subscription::class, $online->getSubscription());
    }

    /**
     * @dataProvider provideEvent
     * @param mixed $event
     */
    public function testGetSetEvent($event)
    {
        $online = new Online();
        $this->assertNull($online->getEvent());
        $this->assertInstanceOf(Online::class, $online->setEvent(null));
        $this->assertNull($online->getEvent());
        $this->assertInstanceOf(Online::class, $online->setEvent($event));
        $this->assertEquals($event, $online->getEvent());
        $this->assertInstanceOf(EventInterface::class, $online->getEvent());
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
