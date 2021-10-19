<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\User;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User\AuthorizationGrant;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\SubscriptionProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

class AuthorizationGrantTest extends TestCase
{
    use TestFakerTrait, SubscriptionProviderTrait;

    /**
     * @dataProvider provideSubscription
     * @param mixed $subscription
     */
    public function testGetSetSubscription($subscription)
    {
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getSubscription());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setSubscription(null));
        $this->assertNull($authorizationGrant->getSubscription());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setSubscription($subscription));
        $this->assertEquals($subscription, $authorizationGrant->getSubscription());
        $this->assertInstanceOf(Subscription::class, $authorizationGrant->getSubscription());
    }

    /**
     * @dataProvider provideEvent
     * @param mixed $event
     */
    public function testGetSetEvent($event)
    {
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getEvent());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setEvent(null));
        $this->assertNull($authorizationGrant->getEvent());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setEvent($event));
        $this->assertEquals($event, $authorizationGrant->getEvent());
        $this->assertInstanceOf(EventInterface::class, $authorizationGrant->getEvent());
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
