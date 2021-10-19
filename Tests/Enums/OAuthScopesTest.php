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
     * @dataProvider provideLabelsValues
     * @param $label
     * @param $value
     */
    public function testEnum($label, $value)
    {
        $enum = OAuthScopes::from($value);
        $this->assertEquals($label, $enum->label);
        $this->assertEquals($value, $enum->value);

        $enum = OAuthScopes::from($label);
        $this->assertEquals($label, $enum->label);
        $this->assertEquals($value, $enum->value);
    }

    /**
     * @dataProvider provideLabelsValues
     * @param $label
     * @param $value
     */
    public function testEnumSerialization($label, $value)
    {
        $serializer = $this->createSerializer();
        $enum = OAuthScopes::from($value);

        $output = $serializer->serialize($enum, 'json');

        $this->assertEquals(json_encode([
            'label' => $label,
            'value' => $value
        ]), $output);
    }

    /**
     * @return Generator
     */
    public function provideLabelsValues()
    {
        yield ['label' => 'analyticsReadExtensions', 'value' => 'analytics:read:extensions'];
        yield ['label' => 'analyticsReadGames', 'value' => 'analytics:read:games'];
        yield ['label' => 'bitsRead', 'value' => 'bits:read'];
        yield ['label' => 'channelEditCommercial', 'value' => 'channel:edit:commercial'];
        yield ['label' => 'channelManageBroadcast', 'value' => 'channel:manage:broadcast'];
        yield ['label' => 'channelManageExtensions', 'value' => 'channel:manage:extensions'];
        yield ['label' => 'channelManagePolls', 'value' => 'channel:manage:polls'];
        yield ['label' => 'channelManagePredictions', 'value' => 'channel:manage:predictions'];
        yield ['label' => 'channelManageRedemptions', 'value' => 'channel:manage:redemptions'];
        yield ['label' => 'channelManageSchedule', 'value' => 'channel:manage:schedule'];
        yield ['label' => 'channelManageVideos', 'value' => 'channel:manage:videos'];
        yield ['label' => 'channelReadEditors', 'value' => 'channel:read:editors'];
        yield ['label' => 'channelReadGoals', 'value' => 'channel:read:goals'];
        yield ['label' => 'channelReadHypeTrain', 'value' => 'channel:read:hype_train'];
        yield ['label' => 'channelReadPolls', 'value' => 'channel:read:polls'];
        yield ['label' => 'channelReadPredictions', 'value' => 'channel:read:predictions'];
        yield ['label' => 'channelReadRedemptions', 'value' => 'channel:read:redemptions'];
        yield ['label' => 'channelReadStreamKey', 'value' => 'channel:read:stream_key'];
        yield ['label' => 'channelReadSubscriptions', 'value' => 'channel:read:subscriptions'];
        yield ['label' => 'clipsEdit', 'value' => 'clips:edit'];
        yield ['label' => 'moderationRead', 'value' => 'moderation:read'];
        yield ['label' => 'moderatorManageAutomod', 'value' => 'moderator:manage:automod'];
        yield ['label' => 'userEdit', 'value' => 'user:edit'];
        yield ['label' => 'userManageBlockedUsers', 'value' => 'user:manage:blocked_users'];
        yield ['label' => 'userReadBlockedUsers', 'value' => 'user:read:blocked_users'];
        yield ['label' => 'userReadBroadcast', 'value' => 'user:read:broadcast'];
        yield ['label' => 'userReadEmail', 'value' => 'user:read:email'];
        yield ['label' => 'userReadFollows', 'value' => 'user:read:follows'];
        yield ['label' => 'userReadSubscriptions', 'value' => 'user:read:subscriptions'];
    }

    /**
     *
     */
    public function testInvalidValue()
    {
        $this->expectException(BadMethodCallException::class);
        OAuthScopes::from('abc123');
    }

    /**
     *
     */
    public function testCoverage()
    {
        $this->coverEnum(OAuthScopes::class);
    }
    
    /**
     *
     */
    public function testGetUserScopes()
    {
        $this->assertCount(0, OAuthScopes::getUserScopes());
    }
}