<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class EventSubStatus
 * @package Bytes\TwitchResponseBundle\Enums
 */
enum EventSubStatus: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case ENABLED = 'enabled';
    case WEBHOOK_CALLBACK_VERIFICATION_PENDING = 'webhook_callback_verification_pending';
    case WEBHOOK_CALLBACK_VERIFICATION_FAILED = 'webhook_callback_verification_failed';
    case NOTIFICATION_FAILURES_EXCEEDED = 'notification_failures_exceeded';
    case AUTHORIZATION_REVOKED = 'authorization_revoked';
    case USER_REMOVED = 'user_removed';

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ENABLED')]
    public static function enabled(): EventSubStatus
    {
        return EventSubStatus::ENABLED;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::WEBHOOK_CALLBACK_VERIFICATION_PENDING')]
    public static function webhookCallbackVerificationPending(): EventSubStatus
    {
        return EventSubStatus::WEBHOOK_CALLBACK_VERIFICATION_PENDING;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::WEBHOOK_CALLBACK_VERIFICATION_FAILED')]
    public static function webhookCallbackVerificationFailed(): EventSubStatus
    {
        return EventSubStatus::WEBHOOK_CALLBACK_VERIFICATION_FAILED;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::NOTIFICATION_FAILURES_EXCEEDED')]
    public static function notificationFailuresExceeded(): EventSubStatus
    {
        return EventSubStatus::NOTIFICATION_FAILURES_EXCEEDED;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::AUTHORIZATION_REVOKED')]
    public static function authorizationRevoked(): EventSubStatus
    {
        return EventSubStatus::AUTHORIZATION_REVOKED;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_REMOVED')]
    public static function userRemoved(): EventSubStatus
    {
        return EventSubStatus::USER_REMOVED;
    }
}
