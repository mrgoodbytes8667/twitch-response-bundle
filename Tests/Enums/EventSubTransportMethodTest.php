<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\Tests\Common\TestEnumTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use PHPUnit\Framework\TestCase;

/**
 * Class EventSubTransportMethodTest
 * @package Bytes\TwitchResponseBundle\Tests\Enums
 */
class EventSubTransportMethodTest extends TestCase
{
    use TestEnumTrait;

    /**
     *
     */
    public function testCoverage()
    {
        $this->coverEnum(EventSubTransportMethod::class);
    }

    /**
     *
     */
    public function testWebhook()
    {
        $this->assertNotNull(EventSubTransportMethod::webhook());
    }
}
