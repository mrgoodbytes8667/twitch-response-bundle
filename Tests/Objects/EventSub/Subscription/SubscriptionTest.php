<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Transport;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;

class SubscriptionTest extends TestCase
{
    use TestTwitchFakerTrait {
        TestTwitchFakerTrait::getProviders as parentProviders;
    }

    /**
     * @dataProvider provideStatus
     * @param mixed $status
     */
    public function testGetSetStatus($status)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getStatus());
        $this->assertInstanceOf(Subscription::class, $subscription->setStatus(null));
        $this->assertNull($subscription->getStatus());
        $this->assertInstanceOf(Subscription::class, $subscription->setStatus($status));
        $this->assertEquals($status, $subscription->getStatus());
    }

    /**
     * @return Generator
     */
    public function provideStatus()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $subscription = new Subscription();
        $this->assertEmpty($subscription->getType());
        $this->assertInstanceOf(Subscription::class, $subscription->setType($type));
        $this->assertEquals($type, $subscription->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideVersion
     * @param mixed $version
     */
    public function testGetSetVersion($version)
    {
        $subscription = new Subscription();
        $this->assertEquals('1', $subscription->getVersion());
        $this->assertInstanceOf(Subscription::class, $subscription->setVersion($version));
        $this->assertEquals($version, $subscription->getVersion());
    }

    /**
     * @return Generator
     */
    public function provideVersion()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideCondition
     * @param mixed $condition
     */
    public function testGetSetCondition($condition)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getCondition());
        $this->assertInstanceOf(Subscription::class, $subscription->setCondition(null));
        $this->assertNull($subscription->getCondition());
        $this->assertInstanceOf(Subscription::class, $subscription->setCondition($condition));
        $this->assertEquals($condition, $subscription->getCondition());
    }

    /**
     * @return Generator
     */
    public function provideCondition()
    {
        $this->setupFaker();

        $conditions = Condition::createFromArray(['broadcasterUserId' => $this->faker->id()]);
        yield [$conditions];

        $conditions = new Condition();
        $conditions->setBroadcasterUserId($this->faker->id());
        yield [$conditions];
    }

    /**
     * @dataProvider provideTransport
     * @param mixed $transport
     */
    public function testGetSetTransport($transport)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getTransport());
        $this->assertInstanceOf(Subscription::class, $subscription->setTransport(null));
        $this->assertNull($subscription->getTransport());
        $this->assertInstanceOf(Subscription::class, $subscription->setTransport($transport));
        $this->assertEquals($transport, $subscription->getTransport());
    }

    /**
     * @return Generator
     */
    public function provideTransport()
    {
        $this->setupFaker();
        yield [Transport::create($this->faker->url(), $this->faker->accessToken(), $this->faker->optional()->randomEnum(EventSubTransportMethod::class))];
    }

    /**
     * @dataProvider provideCreatedAt
     * @param mixed $createdAt
     */
    public function testGetSetCreatedAt($createdAt)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getCreatedAt());
        $this->assertInstanceOf(Subscription::class, $subscription->setCreatedAt(null));
        $this->assertNull($subscription->getCreatedAt());
        $this->assertInstanceOf(Subscription::class, $subscription->setCreatedAt($createdAt));
        $this->assertEquals($createdAt, $subscription->getCreatedAt());
    }

    /**
     * @return Generator
     */
    public function provideCreatedAt()
    {
        $this->setupFaker();
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getId());
        $this->assertInstanceOf(Subscription::class, $subscription->setId(null));
        $this->assertNull($subscription->getId());
        $this->assertInstanceOf(Subscription::class, $subscription->setId($id));
        $this->assertEquals($id, $subscription->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @return array
     */
    protected function getProviders()
    {
        return array_merge($this->parentProviders(), [FakerEnumProvider::class]);
    }
}