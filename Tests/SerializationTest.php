<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Enums\HubMode;
use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use Bytes\TwitchResponseBundle\Enums\StreamType;
use Bytes\TwitchResponseBundle\Enums\SubscriptionTopics;
use Bytes\TwitchResponseBundle\Enums\Twitch\EventSub\EventSubMessageType;
use Bytes\TwitchResponseBundle\Enums\TwitchColors;

class SerializationTest extends TestSerializationCase
{
    public function testHubModeSerialization()
    {
        $serializer = $this->createSerializer();

        $output = $serializer->serialize(HubMode::subscribe(), 'json');

        $this->assertEquals($this->buildFixtureResponse('subscribe'), $output);

        $output = $serializer->serialize(HubMode::unsubscribe(), 'json');

        $this->assertEquals($this->buildFixtureResponse('unsubscribe'), $output);
    }

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

    public function testSubscriptionTopicsSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'streamChanged' => 'streams',
                     'userChanged' => 'users',
                     'follows' => 'users/follows',
                     'extensionsTransactions' => 'extensions/transactions',
                     'moderatorChanged' => 'moderation/moderators/events',
                     'channelBan' => 'moderation/banned/events',
                     'subscriptionChanged' => 'subscriptions/events',
                     'hypeTrain' => 'hypetrain/events',
                 ] as $label => $value) {
            $output = $serializer->serialize(new SubscriptionTopics($label), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }

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
            $output = $serializer->serialize(new EventSubMessageType($label), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }

    public function testEventSubMessageTypeSerializationFakeValue()
    {
        $this->expectException(\BadMethodCallException::class);
        new EventSubMessageType('abc123');
    }
}