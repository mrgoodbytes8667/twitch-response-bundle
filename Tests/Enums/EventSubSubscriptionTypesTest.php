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
        $enum = EventSubSubscriptionTypes::from($value);
        $this->assertEquals($label, $enum->label);
        $this->assertEquals($value, $enum->value);

        $enum = EventSubSubscriptionTypes::from($label);
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
        $enum = EventSubSubscriptionTypes::from($value);

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
        yield ['label' => 'channelSubscriptionEnd', 'value' => 'channel.subscription.end'];
        yield ['label' => 'channelSubscriptionGift', 'value' => 'channel.subscription.gift'];
        yield ['label' => 'channelSubscriptionMessage', 'value' => 'channel.subscription.message'];
        yield ['label' => 'channelCheer', 'value' => 'channel.cheer'];
        yield ['label' => 'channelRaid', 'value' => 'channel.raid'];
        yield ['label' => 'channelBan', 'value' => 'channel.ban'];
        yield ['label' => 'channelUnban', 'value' => 'channel.unban'];
        yield ['label' => 'channelModeratorAdd', 'value' => 'channel.moderator.add'];
        yield ['label' => 'channelModeratorRemove', 'value' => 'channel.moderator.remove'];
        yield ['label' => 'channelPointsCustomRewardAdd', 'value' => 'channel.channel_points_custom_reward.add'];
        yield ['label' => 'channelPointsCustomRewardUpdate', 'value' => 'channel.channel_points_custom_reward.update'];
        yield ['label' => 'channelPointsCustomRewardRemove', 'value' => 'channel.channel_points_custom_reward.remove'];
        yield ['label' => 'channelPointsCustomRewardRedemptionAdd', 'value' => 'channel.channel_points_custom_reward_redemption.add'];
        yield ['label' => 'channelPointsCustomRewardRedemptionUpdate', 'value' => 'channel.channel_points_custom_reward_redemption.update'];
        yield ['label' => 'channelPollBegin', 'value' => 'channel.poll.begin'];
        yield ['label' => 'channelPollProgress', 'value' => 'channel.poll.progress'];
        yield ['label' => 'channelPollEnd', 'value' => 'channel.poll.end'];
        yield ['label' => 'channelPredictionBegin', 'value' => 'channel.prediction.begin'];
        yield ['label' => 'channelPredictionProgress', 'value' => 'channel.prediction.progress'];
        yield ['label' => 'channelPredictionLock', 'value' => 'channel.prediction.lock'];
        yield ['label' => 'channelPredictionEnd', 'value' => 'channel.prediction.end'];
        yield ['label' => 'dropEntitlementGrant', 'value' => 'drop.entitlement.grant'];
        yield ['label' => 'extensionBitsTransactionCreate', 'value' => 'extension.bits_transaction.create'];
        yield ['label' => 'goalBegin', 'value' => 'channel.goal.begin'];
        yield ['label' => 'goalProgress', 'value' => 'channel.goal.progress'];
        yield ['label' => 'goalEnd', 'value' => 'channel.goal.end'];
        yield ['label' => 'hypeTrainBegin', 'value' => 'channel.hype_train.begin'];
        yield ['label' => 'hypeTrainProgress', 'value' => 'channel.hype_train.progress'];
        yield ['label' => 'hypeTrainEnd', 'value' => 'channel.hype_train.end'];
        yield ['label' => 'streamOnline', 'value' => 'stream.online'];
        yield ['label' => 'streamOffline', 'value' => 'stream.offline'];
        yield ['label' => 'userAuthorizationGrant', 'value' => 'user.authorization.grant'];
        yield ['label' => 'userAuthorizationRevoke', 'value' => 'user.authorization.revoke'];
        yield ['label' => 'userUpdate', 'value' => 'user.update'];
    }

    /**
     *
     */
    public function testInvalidValue()
    {
        $this->expectException(BadMethodCallException::class);
        EventSubSubscriptionTypes::from('abc123');
    }

    /**
     *
     */
    public function testCoverage()
    {
        $this->coverEnum(EventSubSubscriptionTypes::class);
    }
}
