<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use BadMethodCallException;
use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class EventSubSubscriptionTypesTest
 * @package Bytes\TwitchResponseBundle\Tests\Enums
 */
class EventSubSubscriptionTypesTest extends TestCase
{
    use TestSerializerTrait, TestEnumTrait;

    /**
     * @dataProvider provideLabelsValues
     * @param $label
     * @param $value
     */
    public function testEnum($label, $value)
    {
        $enum = EventSubSubscriptionTypes::make($value);
        $this->assertEquals($label, $enum->label);
        $this->assertEquals($value, $enum->value);

        $enum = EventSubSubscriptionTypes::make($label);
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
        $enum = EventSubSubscriptionTypes::make($value);

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
        yield ['label' => 'channelUpdate', 'value' => 'channel.update'];
        yield ['label' => 'channelFollow', 'value' => 'channel.follow'];
        yield ['label' => 'channelSubscribe', 'value' => 'channel.subscribe'];
        yield ['label' => 'channelCheer', 'value' => 'channel.cheer'];
        yield ['label' => 'channelRaid', 'value' => 'channel.raid'];
        yield ['label' => 'channelBan', 'value' => 'channel.ban'];
        yield ['label' => 'channelUnban', 'value' => 'channel.unban'];
        yield ['label' => 'channelModeratorAdd', 'value' => 'channel.moderator.add'];
        yield ['label' => 'channelModeratorRemove', 'value' => 'channel.moderator.remove'];
        yield ['label' => 'channelChannelPointsCustomRewardAdd', 'value' => 'channel.channel_points_custom_reward.add'];
        yield ['label' => 'channelChannelPointsCustomRewardUpdate', 'value' => 'channel.channel_points_custom_reward.update'];
        yield ['label' => 'channelChannelPointsCustomRewardRemove', 'value' => 'channel.channel_points_custom_reward.remove'];
        yield ['label' => 'channelChannelPointsCustomRewardRedemptionAdd', 'value' => 'channel.channel_points_custom_reward_redemption.add'];
        yield ['label' => 'channelChannelPointsCustomRewardRedemptionUpdate', 'value' => 'channel.channel_points_custom_reward_redemption.update'];
        yield ['label' => 'channelHypeTrainBegin', 'value' => 'channel.hype_train.begin'];
        yield ['label' => 'channelHypeTrainProgress', 'value' => 'channel.hype_train.progress'];
        yield ['label' => 'channelHypeTrainEnd', 'value' => 'channel.hype_train.end'];
        yield ['label' => 'streamOnline', 'value' => 'stream.online'];
        yield ['label' => 'streamOffline', 'value' => 'stream.offline'];
        yield ['label' => 'userAuthorizationRevoke', 'value' => 'user.authorization.revoke'];
        yield ['label' => 'userUpdate', 'value' => 'user.update'];
    }

    /**
     *
     */
    public function testInvalidValue()
    {
        $this->expectException(BadMethodCallException::class);
        EventSubSubscriptionTypes::make('abc123');
    }

    /**
     *
     */
    public function testCoverage()
    {
        $this->coverEnum(EventSubSubscriptionTypes::class);
    }
}
