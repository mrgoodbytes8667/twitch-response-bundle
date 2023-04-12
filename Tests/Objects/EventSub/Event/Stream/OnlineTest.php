<?php


namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream;


use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream\Online;
use Bytes\TwitchResponseBundle\Objects\Follows\Follow;
use DateTime;
use DateTimeInterface;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;
use function Symfony\Component\String\u;

/**
 * Class OnlineTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream
 */
class OnlineTest extends TestCase
{
    use TestSerializerTrait, TestBroadcasterUserTrait;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $online = new Online();
        $this->assertNull($online->getId());
        $this->assertInstanceOf(Online::class, $online->setId(null));
        $this->assertNull($online->getId());
        $this->assertInstanceOf(Online::class, $online->setId($id));
        $this->assertEquals($id, $online->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [(string)$this->faker->numberBetween(1)];
    }

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $online = new Online();
        $this->assertNull($online->getType());
        $this->assertInstanceOf(Online::class, $online->setType(null));
        $this->assertNull($online->getType());
        $this->assertInstanceOf(Online::class, $online->setType($type));
        $this->assertEquals($type, $online->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        $this->setupFaker();
        yield [$this->faker->randomElement(['live', 'playlist', 'watch_party', 'premiere', 'rerun'])];
    }

    /**
     * @dataProvider provideStartedAt
     * @param mixed $startedAt
     */
    public function testGetSetStartedAt($startedAt)
    {
        $online = new Online();
        $this->assertNull($online->getStartedAt());
        $this->assertInstanceOf(Online::class, $online->setStartedAt(null));
        $this->assertNull($online->getStartedAt());
        $this->assertInstanceOf(Online::class, $online->setStartedAt($startedAt));
        $this->assertEquals($startedAt, $online->getStartedAt());
    }

    /**
     * @return Generator
     */
    public function provideStartedAt()
    {
        $this->setupFaker();
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
    }

    /**
     * @dataProvider provideDateNormalization
     * @param DateTimeInterface $date
     * @param $json
     */
    public function testDateDenormalization($date, $json)
    {
        /** @var Online $deserialized */
        $deserialized = $this->serializer->deserialize($json, Online::class, 'json');
        $this->assertEquals($date->format(DateTimeInterface::ATOM), $deserialized->getStartedAt()->format(DateTimeInterface::ATOM));
    }

    /**
     * @dataProvider provideDateNormalization
     * @param DateTimeInterface $date
     * @param $json
     */
    public function testDateNormalization($date, $json)
    {
        $online = new Online();
        $online->setStartedAt($date);
        $serialized = $this->serializer->serialize($online, 'json');
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

        yield ['date' => new DateTime('2021-04-16T19:22:39Z'), 'json' => '{ "started_at": "2021-04-16T19:22:39.109266699Z" }'];
        yield ['date' => new DateTime('2021-04-16T19:22:39+00:00'), 'json' => '{ "started_at": "2021-04-16T19:22:39.109266699+00:00" }'];

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
                yield ['date' => new DateTime($goodDate), 'json' => '{ "started_at": "' . $date . '" }'];
            }
        }
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
}
