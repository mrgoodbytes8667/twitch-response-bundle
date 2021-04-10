<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream\Offline;
use Generator;

/**
 * Trait TestBroadcasterUserTrait
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream
 *
 * @method assertInstanceOf(string $expected, $actual, string $message = '')
 * @method assertEquals($expected, $actual, string $message = '')
 * @method assertNull($actual, string $message = '')
 */
trait TestBroadcasterUserTrait
{
    use TestFakerTrait;

    /**
     * @dataProvider provideBroadcasterUserId
     * @param mixed $broadcasterUserId
     */
    public function testGetSetBroadcasterUserId($broadcasterUserId)
    {
        $offline = new Offline();
        $this->assertNull($offline->getBroadcasterUserId());
        $this->assertInstanceOf(Offline::class, $offline->setBroadcasterUserId(null));
        $this->assertNull($offline->getBroadcasterUserId());
        $this->assertInstanceOf(Offline::class, $offline->setBroadcasterUserId($broadcasterUserId));
        $this->assertEquals($broadcasterUserId, $offline->getBroadcasterUserId());
    }

    /**
     * @return Generator
     */
    public function provideBroadcasterUserId()
    {
        $this->setupFaker();
        yield [(string)$this->faker->numberBetween(1)];
    }

    /**
     * @dataProvider provideBroadcasterUserId
     * @param mixed $userId
     */
    public function testGetUserId($userId)
    {
        $offline = new Offline();
        $this->assertNull($offline->getUserId());
        $offline->setBroadcasterUserId(null);
        $this->assertNull($offline->getUserId());
        $offline->setBroadcasterUserId($userId);
        $this->assertEquals($userId, $offline->getUserId());
    }

    /**
     * @dataProvider provideBroadcasterUserName
     * @param mixed $broadcasterUserName
     */
    public function testGetSetBroadcasterUserName($broadcasterUserName)
    {
        $offline = new Offline();
        $this->assertNull($offline->getBroadcasterUserName());
        $this->assertInstanceOf(Offline::class, $offline->setBroadcasterUserName(null));
        $this->assertNull($offline->getBroadcasterUserName());
        $this->assertInstanceOf(Offline::class, $offline->setBroadcasterUserName($broadcasterUserName));
        $this->assertEquals($broadcasterUserName, $offline->getBroadcasterUserName());
    }

    /**
     * @return Generator
     * @throws \Exception
     */
    public function provideBroadcasterUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideBroadcasterUserName
     * @param mixed $userName
     */
    public function testGetUserName($userName)
    {
        $offline = new Offline();
        $this->assertNull($offline->getUserName());
        $offline->setBroadcasterUserName(null);
        $this->assertNull($offline->getUserName());
        $offline->setBroadcasterUserName($userName);
        $this->assertEquals($userName, $offline->getUserName());
    }

}
