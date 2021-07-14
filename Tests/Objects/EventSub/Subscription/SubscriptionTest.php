<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Transport;
use DateTime;
use DateTimeInterface;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use function Symfony\Component\String\u;

/**
 * Class SubscriptionTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription
 */
class SubscriptionTest extends TestCase
{
    use CostProviderTrait, TestSerializerTrait, TestTwitchFakerTrait {
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
        $this->assertEquals($transport->getCallback(), $subscription->getCallback());
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
        $this->assertEquals($id, $subscription->getEventSubId());
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
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @dataProvider provideDateNormalization
     * @param DateTimeInterface $date
     * @param $json
     */
    public function testDateDenormalization($date, $json)
    {
        /** @var Subscription $deserialized */
        $deserialized = $this->serializer->deserialize($json, Subscription::class, 'json');
        $this->assertEquals($date->format(DateTimeInterface::ISO8601), $deserialized->getCreatedAt()->format(DateTimeInterface::ISO8601));
    }

    /**
     * @dataProvider provideDateNormalization
     * @param DateTimeInterface $date
     * @param $json
     */
    public function testDateNormalization($date, $json)
    {
        $subscription = new Subscription();
        $subscription->setCreatedAt($date);
        $serialized = $this->serializer->serialize($subscription, 'json');
        $this->assertStringContainsString($date->format('Y'), $serialized);
        $this->assertStringContainsString($date->format('m'), $serialized);
        $this->assertStringContainsString($date->format('d'), $serialized);
        $this->assertStringContainsString($date->format('H'), $serialized);
        $this->assertStringContainsString($date->format('i'), $serialized);
        $this->assertStringContainsString($date->format('s'), $serialized);
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideDateNormalization()
    {
        $this->setupFaker();

        yield ['date' => new DateTime('2021-04-16T19:22:39Z'), 'json' => '{ "created_at": "2021-04-16T19:22:39.109266699Z" }'];
        yield ['date' => new DateTime('2021-04-16T19:22:39+00:00'), 'json' => '{ "created_at": "2021-04-16T19:22:39.109266699+00:00" }'];

        $timezones = [
            'Z',
            '+00:00',
            '+01:00',
            '-01:00',
            'GMT',
            'UTC',
            'America/Chicago',
            null
        ];
        foreach (range(1, 5) as $index) {
            $timezones = array_merge($timezones, [
                $this->faker->timezone(),
                $this->faker->time('\+H:i'),
                $this->faker->time('\-H:i')
            ]);
        }
        foreach ($timezones as $timezone) {
            foreach (['P', 'p'] as $timezoneIdentifier) {
                $date = $this->faker->dateTime(timezone: $timezone);
                $goodDate = $date->format(DateTimeInterface::RFC3339);
                $date = u($date->format('Y-m-d\TH:i:s'))->append('.')->append($this->faker->numberBetween(10000, 99999))->append($this->faker->numberBetween(10000, 99999))->append($date->format($timezoneIdentifier))->toString();
                yield ['date' => new DateTime($goodDate), 'json' => '{ "created_at": "' . $date . '" }'];
            }
        }
    }

    /**
     * @dataProvider provideCost
     * @param mixed $cost
     */
    public function testGetSetCost($cost)
    {
        $subscription = new Subscription();
        $this->assertNull($subscription->getCost());
        $this->assertInstanceOf(Subscription::class, $subscription->setCost(null));
        $this->assertNull($subscription->getCost());
        $this->assertInstanceOf(Subscription::class, $subscription->setCost($cost));
        $this->assertEquals($cost, $subscription->getCost());
    }

    /**
     * @before
     */
    protected function setUpSerializer()
    {
        $this->setupObjectNormalizerParts();
        $normalizer = new TwitchDateTimeNormalizer($this->classMetadataFactory, $this->metadataAwareNameConverter, $this->propertyAccessor, $this->propertyInfo, $this->classDiscriminatorFromClassMetadata);
        $this->serializer = $this->createSerializer(prependNormalizers: [$normalizer]);
    }

    /**
     * @after
     */
    protected function tearDownSerializer(): void
    {
        $this->serializer = null;
    }

    /**
     * @return array
     */
    protected function getProviders()
    {
        return array_merge($this->parentProviders(), [FakerEnumProvider::class]);
    }
}