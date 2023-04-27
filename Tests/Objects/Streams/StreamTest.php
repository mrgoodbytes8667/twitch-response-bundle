<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Streams;

use Bytes\Common\Faker\Providers\EnumProvider;
use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Objects\Streams\Stream;
use DateTime;
use DateTimeInterface;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;
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
        $this->assertEquals($date->format(DateTimeInterface::ATOM), $deserialized->getStartedAt()->format(DateTimeInterface::ATOM));
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
        $stream->setUserLogin($this->faker->userName());
        $stream->setUserName($this->faker->userName());
        $stream->setViewerCount($this->faker->numberBetween());
        $stream->setMature($this->faker->boolean());
        $stream->setTags($this->faker->words());

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
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $stream = new Stream();
        $this->assertNull($stream->getId());
        $this->assertInstanceOf(Stream::class, $stream->setId($id));
        $this->assertEquals($id, $stream->getId());
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
     * @dataProvider provideGameId
     * @param mixed $gameId
     */
    public function testGetSetGameId($gameId)
    {
        $stream = new Stream();
        $this->assertEquals('0', $stream->getGameId());
        $this->assertInstanceOf(Stream::class, $stream->setGameId($gameId));
        $this->assertEquals($gameId, $stream->getGameId());
    }

    /**
     * @return Generator
     */
    public function provideGameId()
    {
        $this->setupFaker();
        yield ['0'];
        yield [0];
        yield ['1'];
        yield [1];
        yield [$this->faker->id()];
        yield [(int)$this->faker->id()];
        yield [(string)$this->faker->id()];
    }

    /**
     * @dataProvider provideGameName
     * @param mixed $gameName
     */
    public function testGetSetGameName($gameName)
    {
        $stream = new Stream();
        $this->assertEquals('', $stream->getGameName());
        $this->assertInstanceOf(Stream::class, $stream->setGameName($gameName));
        $this->assertEquals($gameName, $stream->getGameName());
    }

    /**
     * @return Generator
     */
    public function provideGameName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideStreamId
     * @param mixed $streamId
     */
    public function testGetSetStreamId($streamId)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setStreamId($streamId));
        $this->assertEquals($streamId, $stream->getStreamId());
    }

    /**
     * @return Generator
     */
    public function provideStreamId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @dataProvider provideLanguage
     * @param mixed $language
     */
    public function testGetSetLanguage($language)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setLanguage($language));
        $this->assertEquals($language, $stream->getLanguage());
    }

    /**
     * @return Generator
     */
    public function provideLanguage()
    {
        $this->setupFaker();
        yield [(string)$this->faker->languageCode()];
    }

    /**
     * @dataProvider provideStartedAt
     * @param mixed $startedAt
     */
    public function testGetSetStartedAt($startedAt)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setStartedAt($startedAt));
        $this->assertEquals($startedAt, $stream->getStartedAt());
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
     * @dataProvider provideTagIds
     * @param mixed $tagIds
     */
    public function testGetSetTags($tagIds)
    {
        $stream = new Stream();
        $this->assertNull($stream->getTags());
        $this->assertInstanceOf(Stream::class, $stream->setTags($tagIds));
        $this->assertEquals($tagIds, $stream->getTags());
    }

    /**
     * @return Generator
     */
    public function provideTags()
    {
        $this->setupFaker();
        yield [[]];
        yield [$this->faker->words(3)];
        yield [$this->faker->words(6)];
        yield [[$this->faker->uuid()]];
    }

    /**
     * @dataProvider provideThumbnailUrl
     * @param mixed $thumbnailUrl
     */
    public function testGetSetThumbnailUrl($thumbnailUrl)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setThumbnailUrl($thumbnailUrl));
        $this->assertEquals($thumbnailUrl, $stream->getThumbnailUrl());
    }

    /**
     * @return Generator
     */
    public function provideThumbnailUrl()
    {
        $this->setupFaker();
        yield [$this->faker->imageUrl()];
    }

    /**
     * @dataProvider provideTitle
     * @param mixed $title
     */
    public function testGetSetTitle($title)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setTitle($title));
        $this->assertEquals($title, $stream->getTitle());
    }

    /**
     * @return Generator
     */
    public function provideTitle()
    {
        $this->setupFaker();
        yield [(string)$this->faker->sentence()];
    }

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setType($type));
        $this->assertEquals($type, $stream->getType());
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
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetSetUserId($userId)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setUserId($userId));
        $this->assertEquals($userId, $stream->getUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @dataProvider provideUserLogin
     * @param mixed $userLogin
     */
    public function testGetSetUserLogin($userLogin)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setUserLogin($userLogin));
        $this->assertEquals($userLogin, $stream->getUserLogin());
    }

    /**
     * @return Generator
     */
    public function provideUserLogin()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetSetUserName($userName)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setUserName($userName));
        $this->assertEquals($userName, $stream->getUserName());
    }

    /**
     * @return Generator
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideViewerCount
     * @param mixed $viewerCount
     */
    public function testGetSetViewerCount($viewerCount)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setViewerCount($viewerCount));
        $this->assertEquals($viewerCount, $stream->getViewerCount());
    }

    /**
     * @return Generator
     */
    public function provideViewerCount()
    {
        $this->setupFaker();
        yield [$this->faker->numberBetween()];
        foreach (range(0, 5) as $index) {
            yield [$index];
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
        return array_merge($this->parentProviders(), [EnumProvider::class]);
    }

    /**
     * @dataProvider provideMature
     * @param bool $mature
     */
    public function testGetSetMature($mature)
    {
        $stream = new Stream();
        $this->assertInstanceOf(Stream::class, $stream->setMature($mature));
        $this->assertEquals($mature, $stream->isMature());
    }

    /**
     * @return Generator
     */
    public function provideMature()
    {
        yield [true];
        yield [false];
    }
}