<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\TwitchResponseBundle\Enums\EventSubMessageType;
use Bytes\TwitchResponseBundle\Enums\EventSubStatus;
use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Enums\OAuthForceVerify;
use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use Bytes\TwitchResponseBundle\Enums\StreamType;
use Generator;

trait StringBackedEnumClassesTestTrait
{
    /**
     * @return Generator
     */
    public static function provideStringBackedEnumClasses()
    {
        yield [EventSubMessageType::class];
        yield [EventSubStatus::class];
        yield [EventSubSubscriptionTypes::class];
        yield [EventSubTransportMethod::class];
        yield [OAuthForceVerify::class];
        yield [OAuthScopes::class];
        yield [StreamType::class];
    }
}
