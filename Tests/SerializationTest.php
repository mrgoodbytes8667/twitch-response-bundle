<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use Bytes\TwitchResponseBundle\Enums\StreamType;
use Bytes\TwitchResponseBundle\Enums\EventSubMessageType;
use Bytes\TwitchResponseBundle\Enums\EventSubStatus;
use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Enums\TwitchColors;

class SerializationTest extends TestSerializationCase
{
    public function testOAuthScopesSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'analyticsReadExtensions' => 'analytics:read:extensions',
                     'analyticsReadGames' => 'analytics:read:games',
                     'bitsRead' => 'bits:read',
                     'channelEditCommercial' => 'channel:edit:commercial',
                     'channelManageBroadcast' => 'channel:manage:broadcast',
                     'channelManageExtension' => 'channel:manage:extension',
                     'channelReadHypeTrain' => 'channel:read:hype_train',
                     'channelReadStreamKey' => 'channel:read:stream_key',
                     'channelReadSubscriptions' => 'channel:read:subscriptions',
                     'clipsEdit' => 'clips:edit',
                     'userEdit' => 'user:edit',
                     'userEditFollows' => 'user:edit:follows',
                     'userReadBroadcast' => 'user:read:broadcast',
                     'userReadEmail' => 'user:read:email',
                 ] as $label => $value) {
            $output = $serializer->serialize(new OAuthScopes($label), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }


    }

    public function testOAuthScopesDeprecatedSerializationUserEditBroadcast()
    {
        $this->expectException(\BadMethodCallException::class);
        OAuthScopes::userEditBroadcast();
    }

    public function testOAuthScopesDeprecatedSerializationUserReadStreamKey()
    {
        $this->expectException(\BadMethodCallException::class);
        OAuthScopes::userReadStreamKey();
    }

    public function testStreamTypeSerialization()
    {
        $serializer = $this->createSerializer();

        $output = $serializer->serialize(StreamType::live(), 'json');

        $this->assertEquals($this->buildFixtureResponse('live'), $output);

        $output = $serializer->serialize(StreamType::offline(), 'json');

        $this->assertEquals($this->buildFixtureResponse('offline'), $output);
    }

    public function testTwitchColorsSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'primaryTwitchPurple' => TwitchColors::PRIMARY_TWITCH_PURPLE,
                     'primaryBlackOps' => TwitchColors::PRIMARY_BLACK_OPS,
                     'mutedIce' => TwitchColors::MUTED_ICE,
                     'mutedJiggle' => TwitchColors::MUTED_JIGGLE,
                     'mutedWorm' => TwitchColors::MUTED_WORM,
                     'mutedIsabelle' => TwitchColors::MUTED_ISABELLE,
                     'mutedDroid' => TwitchColors::MUTED_DROID,
                     'mutedWipeOut' => TwitchColors::MUTED_WIPE_OUT,
                     'mutedSmoke' => TwitchColors::MUTED_SMOKE,
                     'mutedWidow' => TwitchColors::MUTED_WIDOW,
                     'mutedPeach' => TwitchColors::MUTED_PEACH,
                     'mutedPacman' => TwitchColors::MUTED_PACMAN,
                     'mutedFelicia' => TwitchColors::MUTED_FELICIA,
                     'mutedSonic' => TwitchColors::MUTED_SONIC,
                     'accentDragon' => TwitchColors::ACCENT_DRAGON,
                     'accentCuddle' => TwitchColors::ACCENT_CUDDLE,
                     'accentBandit' => TwitchColors::ACCENT_BANDIT,
                     'accentLightning' => TwitchColors::ACCENT_LIGHTNING,
                     'accentKo' => TwitchColors::ACCENT_KO,
                     'accentMega' => TwitchColors::ACCENT_MEGA,
                     'accentNights' => TwitchColors::ACCENT_NIGHTS,
                     'accentOsu' => TwitchColors::ACCENT_OSU,
                     'accentSniper' => TwitchColors::ACCENT_SNIPER,
                     'accentEgg' => TwitchColors::ACCENT_EGG,
                     'accentLegend' => TwitchColors::ACCENT_LEGEND,
                     'accentZero' => TwitchColors::ACCENT_ZERO,
                 ] as $label => $value) {
            $output = $serializer->serialize(new TwitchColors($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }

    }

    public function testEventSubMessageTypeSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'webhookCallbackVerification' => 'webhook_callback_verification',
                     'notification' => 'notification',
                     'revocation' => 'revocation',
                 ] as $label => $value) {
            $output = $serializer->serialize(EventSubMessageType::from($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }

    public function testEventSubMessageTypeSerializationFakeValue()
    {
        $this->expectException(\BadMethodCallException::class);
        EventSubMessageType::from('abc123');
    }

    public function testEventSubStatusSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'enabled' => 'enabled',
                     'webhookCallbackVerificationPending' => 'webhook_callback_verification_pending',
                     'webhookCallbackVerificationFailed' => 'webhook_callback_verification_failed',
                     'notificationFailuresExceeded' => 'notification_failures_exceeded',
                     'authorizationRevoked' => 'authorization_revoked',
                     'userRemoved' => 'user_removed',
                 ] as $label => $value) {
            $output = $serializer->serialize(new EventSubStatus($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }

    public function testEventSubStatusSerializationFakeValue()
    {
        $this->expectException(\BadMethodCallException::class);
        new EventSubStatus('abc123');
    }

    public function testEventSubSubscriptionTypesSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'channelUpdate' => 'channel.update',
                     'channelFollow' => 'channel.follow',
                     'channelSubscribe' => 'channel.subscribe',
                     'channelCheer' => 'channel.cheer',
                     'channelBan' => 'channel.ban',
                     'channelUnban' => 'channel.unban',
                     'channelChannelPointsCustomRewardAdd' => 'channel.channel_points_custom_reward.add',
                     'channelChannelPointsCustomRewardUpdate' => 'channel.channel_points_custom_reward.update',
                     'channelChannelPointsCustomRewardRemove' => 'channel.channel_points_custom_reward.remove',
                     'channelChannelPointsCustomRewardRedemptionAdd' => 'channel.channel_points_custom_reward_redemption.add',
                     'channelChannelPointsCustomRewardRedemptionUpdate' => 'channel.channel_points_custom_reward_redemption.update',
                     'channelHypeTrainBegin' => 'channel.hype_train.begin',
                     'channelHypeTrainProgress' => 'channel.hype_train.progress',
                     'channelHypeTrainEnd' => 'channel.hype_train.end',
                     'streamOnline' => 'stream.online',
                     'streamOffline' => 'stream.offline',
                     'userAuthorizationRevoke' => 'user.authorization.revoke',
                     'userUpdate' => 'user.update',
                 ] as $label => $value) {
            $output = $serializer->serialize(new EventSubSubscriptionTypes($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }

    public function testEventSubSubscriptionTypesSerializationFakeValue()
    {
        $this->expectException(\BadMethodCallException::class);
        new EventSubSubscriptionTypes('abc123');
    }

    public function testEventSubTransportMethodSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'webhook' => 'webhook',
                 ] as $label => $value) {
            $output = $serializer->serialize(new EventSubTransportMethod($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }

    public function testEventSubTransportMethodSerializationFakeValue()
    {
        $this->expectException(\BadMethodCallException::class);
        new EventSubTransportMethod('abc123');
    }
}