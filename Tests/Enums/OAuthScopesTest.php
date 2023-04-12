<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use BadMethodCallException;
use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class OAuthScopesTest
 * @package Bytes\TwitchResponseBundle\Tests\Enums
 */
class OAuthScopesTest extends TestCase
{
    use TestSerializerTrait, TestEnumTrait;
    
    /**
     *
     */
    public function testGetUserScopes()
    {
        $this->assertCount(0, OAuthScopes::getUserScopes());
    }
}