<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\User;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User\AuthorizationRevoke;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\SubscriptionProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

class AuthorizationRevokeTest extends TestCase
{
    use TestFakerTrait, SubscriptionProviderTrait;

    /**
     * @dataProvider provideSubscription
     * @param mixed $subscription
     */
    public function testGetSetSubscription($subscription)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getSubscription());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setSubscription(null));
        $this->assertNull($authorizationRevoke->getSubscription());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setSubscription($subscription));
        $this->assertEquals($subscription, $authorizationRevoke->getSubscription());
        $this->assertInstanceOf(Subscription::class, $authorizationRevoke->getSubscription());
    }

    /**
     * @dataProvider provideEvent
     * @param mixed $event
     */
    public function testGetSetEvent($event)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getEvent());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setEvent(null));
        $this->assertNull($authorizationRevoke->getEvent());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setEvent($event));
        $this->assertEquals($event, $authorizationRevoke->getEvent());
        $this->assertInstanceOf(EventInterface::class, $authorizationRevoke->getEvent());
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