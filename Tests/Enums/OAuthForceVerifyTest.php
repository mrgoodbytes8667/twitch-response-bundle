<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\TwitchResponseBundle\Enums\OAuthForceVerify;
use PHPUnit\Framework\TestCase;

class OAuthForceVerifyTest extends TestCase
{
    /**
     *
     */
    public function testPrompt()
    {
        $this->assertTrue(OAuthForceVerify::TRUE->prompt());
        $this->assertFalse(OAuthForceVerify::FALSE->prompt());
    }
}
