<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Streams;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Streams\Stream;
use Bytes\TwitchResponseBundle\Objects\Streams\StreamsResponse;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class StreamsResponseTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Streams
 */
class StreamsResponseTest extends TestCase
{
    use TestTwitchFakerTrait {
        TestTwitchFakerTrait::getProviders as parentProviders;
    }

    /**
     * @throws Exception
     */
    public function testGetSetData()
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

        $response = new StreamsResponse();
        $this->assertNull($response->getData());
        $response->setData([$stream]);
        $this->assertCount(1, $response->getData());
    }
}
