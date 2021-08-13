<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Videos;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Bytes\TwitchResponseBundle\Objects\Videos\Video;
use DateTime;
use DateTimeImmutable;
use Generator;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    use TestTwitchFakerTrait, NullProviderTrait;

    /**
     * @dataProvider provideVideoId
     * @dataProvider provideNull
     * @param mixed $videoId
     */
    public function testGetSetVideoId($videoId)
    {
        $video = new Video();
        $this->assertNull($video->getVideoId());
        $this->assertInstanceOf(Video::class, $video->setVideoId(null));
        $this->assertNull($video->getVideoId());
        $this->assertInstanceOf(Video::class, $video->setVideoId($videoId));
        $this->assertEquals($videoId, $video->getVideoId());
    }

    /**
     * @return Generator
     */
    public function provideVideoId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @dataProvider provideStreamId
     * @dataProvider provideNull
     * @param mixed $streamId
     */
    public function testGetSetStreamId($streamId)
    {
        $video = new Video();
        $this->assertNull($video->getStreamId());
        $this->assertInstanceOf(Video::class, $video->setStreamId(null));
        $this->assertNull($video->getStreamId());
        $this->assertInstanceOf(Video::class, $video->setStreamId($streamId));
        $this->assertEquals($streamId, $video->getStreamId());
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
     * @dataProvider provideUserId
     * @dataProvider provideNull
     * @param mixed $userId
     */
    public function testGetSetUserId($userId)
    {
        $video = new Video();
        $this->assertNull($video->getUserId());
        $this->assertInstanceOf(Video::class, $video->setUserId(null));
        $this->assertNull($video->getUserId());
        $this->assertInstanceOf(Video::class, $video->setUserId($userId));
        $this->assertEquals($userId, $video->getUserId());
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
     * @dataProvider provideNull
     * @param mixed $userLogin
     */
    public function testGetSetUserLogin($userLogin)
    {
        $video = new Video();
        $this->assertNull($video->getUserLogin());
        $this->assertInstanceOf(Video::class, $video->setUserLogin(null));
        $this->assertNull($video->getUserLogin());
        $this->assertInstanceOf(Video::class, $video->setUserLogin($userLogin));
        $this->assertEquals($userLogin, $video->getUserLogin());
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
     * @dataProvider provideNull
     * @param mixed $userName
     */
    public function testGetSetUserName($userName)
    {
        $video = new Video();
        $this->assertNull($video->getUserName());
        $this->assertInstanceOf(Video::class, $video->setUserName(null));
        $this->assertNull($video->getUserName());
        $this->assertInstanceOf(Video::class, $video->setUserName($userName));
        $this->assertEquals($userName, $video->getUserName());
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
     * @dataProvider provideTitle
     * @dataProvider provideNull
     * @param mixed $title
     */
    public function testGetSetTitle($title)
    {
        $video = new Video();
        $this->assertNull($video->getTitle());
        $this->assertInstanceOf(Video::class, $video->setTitle(null));
        $this->assertNull($video->getTitle());
        $this->assertInstanceOf(Video::class, $video->setTitle($title));
        $this->assertEquals($title, $video->getTitle());
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
     * @dataProvider provideDescription
     * @dataProvider provideNull
     * @param mixed $description
     */
    public function testGetSetDescription($description)
    {
        $video = new Video();
        $this->assertNull($video->getDescription());
        $this->assertInstanceOf(Video::class, $video->setDescription(null));
        $this->assertNull($video->getDescription());
        $this->assertInstanceOf(Video::class, $video->setDescription($description));
        $this->assertEquals($description, $video->getDescription());
    }

    /**
     * @return Generator
     */
    public function provideDescription()
    {
        $this->setupFaker();
        yield [(string)$this->faker->sentence()];
    }

    /**
     * @dataProvider provideCreatedAt
     * @dataProvider provideNull
     * @param mixed $createdAt
     */
    public function testGetSetCreatedAt($createdAt)
    {
        $video = new Video();
        $this->assertNull($video->getCreatedAt());
        $this->assertInstanceOf(Video::class, $video->setCreatedAt(null));
        $this->assertNull($video->getCreatedAt());
        $this->assertInstanceOf(Video::class, $video->setCreatedAt($createdAt));
        $this->assertEquals($createdAt, $video->getCreatedAt());
    }

    /**
     * @return Generator
     */
    public function provideCreatedAt()
    {
        $this->setupFaker();
        yield [new DateTime()];
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
        yield [new DateTimeImmutable()];
    }

    /**
     * @dataProvider providePublishedAt
     * @dataProvider provideNull
     * @param mixed $publishedAt
     */
    public function testGetSetPublishedAt($publishedAt)
    {
        $video = new Video();
        $this->assertNull($video->getPublishedAt());
        $this->assertInstanceOf(Video::class, $video->setPublishedAt(null));
        $this->assertNull($video->getPublishedAt());
        $this->assertInstanceOf(Video::class, $video->setPublishedAt($publishedAt));
        $this->assertEquals($publishedAt, $video->getPublishedAt());
    }

    /**
     * @return Generator
     */
    public function providePublishedAt()
    {
        $this->setupFaker();
        yield [new DateTime()];
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
        yield [new DateTimeImmutable()];
    }

    /**
     * @dataProvider provideUrl
     * @dataProvider provideNull
     * @param mixed $url
     */
    public function testGetSetUrl($url)
    {
        $video = new Video();
        $this->assertNull($video->getUrl());
        $this->assertInstanceOf(Video::class, $video->setUrl(null));
        $this->assertNull($video->getUrl());
        $this->assertInstanceOf(Video::class, $video->setUrl($url));
        $this->assertEquals($url, $video->getUrl());
    }

    /**
     * @return Generator
     */
    public function provideUrl()
    {
        $this->setupFaker();
        yield [$this->faker->url()];
    }

    /**
     * @dataProvider provideThumbnailUrl
     * @dataProvider provideNull
     * @param mixed $thumbnailUrl
     */
    public function testGetSetThumbnailUrl($thumbnailUrl)
    {
        $video = new Video();
        $this->assertNull($video->getThumbnailUrl());
        $this->assertInstanceOf(Video::class, $video->setThumbnailUrl(null));
        $this->assertNull($video->getThumbnailUrl());
        $this->assertInstanceOf(Video::class, $video->setThumbnailUrl($thumbnailUrl));
        $this->assertEquals($thumbnailUrl, $video->getThumbnailUrl());
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
     * @dataProvider provideViewable
     * @dataProvider provideNull
     * @param mixed $viewable
     */
    public function testGetSetViewable($viewable)
    {
        $video = new Video();
        $this->assertNull($video->getViewable());
        $this->assertInstanceOf(Video::class, $video->setViewable(null));
        $this->assertNull($video->getViewable());
        $this->assertInstanceOf(Video::class, $video->setViewable($viewable));
        $this->assertEquals($viewable, $video->getViewable());
    }

    /**
     * @return Generator
     */
    public function provideViewable()
    {
        $this->setupFaker();
        yield ['public'];
        yield ['private'];
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideViewCount
     * @dataProvider provideNull
     * @param mixed $viewCount
     */
    public function testGetSetViewCount($viewCount)
    {
        $video = new Video();
        $this->assertNull($video->getViewCount());
        $this->assertInstanceOf(Video::class, $video->setViewCount(null));
        $this->assertNull($video->getViewCount());
        $this->assertInstanceOf(Video::class, $video->setViewCount($viewCount));
        $this->assertEquals($viewCount, $video->getViewCount());
    }

    /**
     * @return Generator
     */
    public function provideViewCount()
    {
        $this->setupFaker();
        yield [0];
        yield [$this->faker->numberBetween(1, 99999)];
    }

    /**
     * @dataProvider provideLanguage
     * @dataProvider provideNull
     * @param mixed $language
     */
    public function testGetSetLanguage($language)
    {
        $video = new Video();
        $this->assertNull($video->getLanguage());
        $this->assertInstanceOf(Video::class, $video->setLanguage(null));
        $this->assertNull($video->getLanguage());
        $this->assertInstanceOf(Video::class, $video->setLanguage($language));
        $this->assertEquals($language, $video->getLanguage());
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
     * @dataProvider provideType
     * @dataProvider provideNull
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $video = new Video();
        $this->assertNull($video->getType());
        $this->assertInstanceOf(Video::class, $video->setType(null));
        $this->assertNull($video->getType());
        $this->assertInstanceOf(Video::class, $video->setType($type));
        $this->assertEquals($type, $video->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        $this->setupFaker();
        yield ['upload'];
        yield ['archive'];
        yield ['highlight'];
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideDuration
     * @dataProvider provideNull
     * @param mixed $duration
     */
    public function testGetSetDuration($duration)
    {
        $video = new Video();
        $this->assertNull($video->getDuration());
        $this->assertInstanceOf(Video::class, $video->setDuration(null));
        $this->assertNull($video->getDuration());
        $this->assertInstanceOf(Video::class, $video->setDuration($duration));
        $this->assertEquals($duration, $video->getDuration());
    }

    /**
     * @return Generator
     */
    public function provideDuration()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }
}