<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscriptions;
use Bytes\TwitchResponseBundle\Objects\Pagination;
use Generator;
use PHPUnit\Framework\TestCase;

class SubscriptionsTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     * @dataProvider provideData
     * @param mixed $data
     */
    public function testGetSetDataSubscriptions($data)
    {
        $subscriptions = new Subscriptions();
        $this->assertNull($subscriptions->getData());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setData(null));
        $this->assertNull($subscriptions->getData());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setData($data));
        $this->assertEquals($data, $subscriptions->getData());

        $this->assertEquals($data, $subscriptions->getSubscriptions());
        $this->assertInstanceOf(Subscription::class, $subscriptions->getSubscription());
    }

    /**
     * @return Generator
     */
    public function provideData()
    {
        $this->setupFaker();
        yield [[new Subscription(), new Subscription()]];
    }

    /**
     * @dataProvider provideLimit
     * @param mixed $limit
     */
    public function testGetSetLimit($limit)
    {
        $subscriptions = new Subscriptions();
        $this->assertNull($subscriptions->getLimit());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setLimit(null));
        $this->assertNull($subscriptions->getLimit());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setLimit($limit));
        $this->assertEquals($limit, $subscriptions->getLimit());
    }

    /**
     * @return Generator
     */
    public function provideLimit()
    {
        $this->setupFaker();
        yield [$this->faker->numberBetween()];
    }

    /**
     * @dataProvider provideTotal
     * @param mixed $total
     */
    public function testGetSetTotal($total)
    {
        $subscriptions = new Subscriptions();
        $this->assertNull($subscriptions->getTotal());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setTotal(null));
        $this->assertNull($subscriptions->getTotal());
        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setTotal($total));
        $this->assertEquals($total, $subscriptions->getTotal());
    }

    /**
     * @return Generator
     */
    public function provideTotal()
    {
        $this->setupFaker();
        yield [$this->faker->numberBetween()];
    }

    /**
     *
     */
    public function testGetSetPagination()
    {
        $subscriptions = new Subscriptions();
        $this->assertNull($subscriptions->getPagination());

        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setPagination(null));
        $this->assertNull($subscriptions->getPagination());

        $this->assertInstanceOf(Subscriptions::class, $subscriptions->setPagination(['cursor' => $this->faker->uuid()]));

    }
}
