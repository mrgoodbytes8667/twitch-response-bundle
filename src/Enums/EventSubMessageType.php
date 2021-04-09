<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class EventSubMessageType
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self webhookCallbackVerification()
 * @method static self notification()
 * @method static self revocation()
 *
 * @link https://dev.twitch.tv/docs/eventsub#subscriptions
 */
class EventSubMessageType extends Enum
{
    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'webhookCallbackVerification' => 'webhook_callback_verification',
        ];
    }
}