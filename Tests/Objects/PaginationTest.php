<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Pagination;
use PHPUnit\Framework\TestCase;

/**
 * Class PaginationTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects
 */
class PaginationTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     *
     */
    public function testMakeWithCursor()
    {
        $cursor = $this->faker->uuid();

        $pagination = Pagination::make($cursor);

        $this->assertInstanceOf(Pagination::class, $pagination);
        $this->assertEquals($cursor, $pagination->getCursor());
    }

    /**
     *
     */
    public function testMakeWithoutCursor()
    {
        $pagination = Pagination::make();

        $this->assertNull($pagination);
    }

    /**
     *
     */
    public function testGetSetCursor()
    {
        $pagination = new Pagination();
        $this->assertNull($pagination->getCursor());
        $this->assertInstanceOf(Pagination::class, $pagination->setCursor(null));
        $this->assertNull($pagination->getCursor());

        $cursor = $this->faker->uuid();
        $this->assertInstanceOf(Pagination::class, $pagination->setCursor($cursor));
        $this->assertEquals($cursor, $pagination->getCursor());
    }
}