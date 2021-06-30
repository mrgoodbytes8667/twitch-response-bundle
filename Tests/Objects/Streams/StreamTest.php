<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Streams;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Objects\Streams\Stream;
use DateTime;
use DateTimeInterface;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;
use Symfony\Component\Serializer\SerializerInterface;
use function Symfony\Component\String\u;

/**
 * Class StreamTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Streams
 */
class StreamTest extends TestCase
{
    use TestSerializerTrait, TestTwitchFakerTrait {
        TestTwitchFakerTrait::getProviders as parentProviders;
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
        /** @var Stream $deserialized */
        $deserialized = $this->serializer->deserialize($json, Stream::class, 'json');
        $this->assertEquals($date->format(DateTimeInterface::ISO8601), $deserialized->getStartedAt()->format(DateTimeInterface::ISO8601));
    }

    /**
     * @dataProvider provideDateNormalization
     * @param DateTimeInterface $date
     * @param $json
     * @throws Exception
     */
    public function testDateNormalization($date, $json)
    {
        $stream = new Stream();
        $stream->setGameId($this->faker->id());
        $stream->setGameName($this->faker->word());
        $stream->setId($this->faker->id());
        $stream->setLanguage($this->faker->locale());
        $stream->setThumbnailUrl($this->faker->imageUrl());
        $stream->setTitle($this->faker->paragraph());
        $stream->setType($this->faker->word());
        $stream->setUserId($this->faker->id());
        $stream->setUserName($this->faker->userName());
        $stream->setViewerCount($this->faker->numberBetween());

        $stream->setStartedAt($date);

        $serialized = $this->serializer->serialize($stream, 'json');
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

    /**
     * @return array
     */
    protected function getProviders()
    {
        return array_merge($this->parentProviders(), [FakerEnumProvider::class]);
    }
}