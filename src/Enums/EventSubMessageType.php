<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class EventSubMessageType
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @link https://dev.twitch.tv/docs/eventsub#subscriptions
 */
enum EventSubMessageType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case WEBHOOK_CALLBACK_VERIFICATION = 'webhook_callback_verification';
    case NOTIFICATION = 'notification';
    case REVOCATION = 'revocation';

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::WEBHOOK_CALLBACK_VERIFICATION')]
    public static function webhookCallbackVerification(): EventSubMessageType
    {
        return EventSubMessageType::WEBHOOK_CALLBACK_VERIFICATION;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::NOTIFICATION')]
    public static function notification(): EventSubMessageType
    {
        return EventSubMessageType::NOTIFICATION;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::REVOCATION')]
    public static function revocation(): EventSubMessageType
    {
        return EventSubMessageType::REVOCATION;
    }
}
