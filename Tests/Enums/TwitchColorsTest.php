<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\Tests\Common\TestEnumTrait;
use Bytes\TwitchResponseBundle\Enums\TwitchColors;
use PHPUnit\Framework\TestCase;

/**
 * Class TwitchColorsTest
 * @package Bytes\TwitchResponseBundle\Tests\Enums
 */
class TwitchColorsTest extends TestCase
{
    use TestEnumTrait;

    /**
     *
     */
    public function testCoverage()
    {
        $this->coverEnum(TwitchColors::class);
    }

    /**
     *
     */
    public function testMuted()
    {
        $this->assertCount(12, TwitchColors::muted());
    }

    /**
     *
     */
    public function testAccent()
    {
        $this->assertCount(12, TwitchColors::accent());
    }

    /**
     *
     */
    public function testPrimary()
    {
        $this->assertCount(3, TwitchColors::primary());
    }
}