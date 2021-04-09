<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\User;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User\Update;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\SubscriptionProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    use TestFakerTrait, SubscriptionProviderTrait;

    /**
     * @dataProvider provideSubscription
     * @param mixed $subscription
     */
    public function testGetSetSubscription($subscription)
    {
        $update = new Update();
        $this->assertNull($update->getSubscription());
        $this->assertInstanceOf(Update::class, $update->setSubscription(null));
        $this->assertNull($update->getSubscription());
        $this->assertInstanceOf(Update::class, $update->setSubscription($subscription));
        $this->assertEquals($subscription, $update->getSubscription());
        $this->assertInstanceOf(Subscription::class, $update->getSubscription());
    }

    /**
     * @dataProvider provideEvent
     * @param mixed $event
     */
    public function testGetSetEvent($event)
    {
        $update = new Update();
        $this->assertNull($update->getEvent());
        $this->assertInstanceOf(Update::class, $update->setEvent(null));
        $this->assertNull($update->getEvent());
        $this->assertInstanceOf(Update::class, $update->setEvent($event));
        $this->assertEquals($event, $update->getEvent());
        $this->assertInstanceOf(EventInterface::class, $update->getEvent());
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
