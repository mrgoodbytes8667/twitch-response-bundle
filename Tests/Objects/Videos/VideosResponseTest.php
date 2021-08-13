<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Videos;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Videos\Video;
use Bytes\TwitchResponseBundle\Objects\Videos\VideosResponse;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class VideosResponseTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testGetSetData($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $this->assertNull($g->getData());
        $this->assertInstanceOf(VideosResponse::class, $g->setData(null));
        $this->assertNull($g->getData());
        $this->assertInstanceOf(VideosResponse::class, $g->setData([]));
        $this->assertCount(0, $g->getData());

        $this->assertInstanceOf(VideosResponse::class, $g->setData($videos));
        $this->assertCount($count, $g->getData());
        $this->assertEquals($videos, $g->getData());

        return $g;
    }

    /**
     * @return Generator
     */
    public function provideVideos()
    {
        $this->setupFaker();

        $videos = [];
        $firstVideo = $this->buildVideo();
        $videos[] = $firstVideo;
        foreach (range(1, 3) as $i) {
            $videos[] = $this->buildVideo();
        }
        $lastVideo = $this->buildVideo();
        $videos[] = $lastVideo;

        yield ['videos' => $videos, 'count' => 5, 'first' => $firstVideo, 'last' => $lastVideo];
    }

    /**
     * @return Video
     */
    private function buildVideo(): Video
    {
        $video = new Video();
        $video->setVideoID($this->faker->id())
            ->setStreamId($this->faker->id())
            ->setUserId($this->faker->id())
            ->setUserLogin($this->faker->userName())
            ->setUserName($this->faker->userName())
            ->setTitle($this->faker->sentence())
            ->setDescription($this->faker->sentence())
            ->setCreatedAt($this->faker->dateTimeInInterval('-1 week', 'now'))
            ->setPublishedAt($this->faker->dateTimeInInterval('-1 week', 'now'))
            ->setUrl($this->faker->url())
            ->setThumbnailUrl($this->faker->imageUrl())
            ->setViewable($this->faker->randomElement(["public", "private"]))
            ->setLanguage($this->faker->locale())
            ->setType($this->faker->randomElement(['upload', 'archive', 'highlight']))
            ->setDuration($this->faker->word());

        return $video;
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testCount($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $this->assertCount($count, $g->getData());
        $this->assertEquals($count, $g->count());
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testFirst($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $this->assertEquals($first, $g->first());
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testLast($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $this->assertEquals($last, $g->last());
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testGet($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $video = $g->getData()[2];
        $this->assertEquals($video, $g->get(2));
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testRandom($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $this->assertInstanceOf(Video::class, $g->random());
    }

    /**
     *
     */
    public function testRandomNull()
    {
        $g = new VideosResponse();
        $this->assertNull($g->random());
    }

    /**
     * @dataProvider provideVideos
     * @param $videos
     * @param $count
     * @param $first
     * @param $last
     */
    public function testPointers($videos, $count, $first, $last)
    {
        $g = new VideosResponse();
        $g->setData($videos);

        $video = $g->getData()[2];
        $this->assertEquals($video, $g->get(2));

        $this->assertEquals($first, $g->first());
        $this->assertEquals($video, $g->get(2));
        $this->assertEquals($last, $g->last());
        $this->assertEquals($video, $g->get(2));
        $this->assertEquals($last, $g->last());
        $this->assertEquals($video, $g->get(2));
        $this->assertEquals($first, $g->first());
    }
}