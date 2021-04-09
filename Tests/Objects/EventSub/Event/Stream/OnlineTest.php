<?php


namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream;


use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream\Online;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class OnlineTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Stream
 */
class OnlineTest extends TestCase
{
    use TestBroadcasterUserTrait;

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
}