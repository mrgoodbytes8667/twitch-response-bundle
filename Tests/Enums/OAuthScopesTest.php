<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use PHPUnit\Framework\TestCase;

/**
 * Class OAuthScopesTest
 * @package Bytes\TwitchResponseBundle\Tests\Enums
 */
class OAuthScopesTest extends TestCase
{
    /**
     *
     */
    public function testGetUserScopes()
    {
        $this->assertCount(0, OAuthScopes::getUserScopes());
    }

    /**
     *
     */
    public function testBuildOAuthString()
    {
        $this->assertEquals('user:read:email bits:read', OAuthScopes::buildOAuthString(OAuthScopes::userReadEmail(), OAuthScopes::bitsRead()));
    }
}