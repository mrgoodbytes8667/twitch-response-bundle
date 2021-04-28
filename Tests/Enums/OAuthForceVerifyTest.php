<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\Tests\Common\TestEnumTrait;
use Bytes\TwitchResponseBundle\Enums\OAuthForceVerify;
use PHPUnit\Framework\TestCase;

class OAuthForceVerifyTest extends TestCase
{
    /**
     *
     */
    public function testPrompt()
    {
        $this->assertTrue(OAuthForceVerify::true()->prompt());
        $this->assertFalse(OAuthForceVerify::false()->prompt());
    }
}
