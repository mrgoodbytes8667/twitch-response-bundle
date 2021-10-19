<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.5.3', 'The "\Bytes\TwitchResponseBundle\Enums\HubMode" class is deprecated, there is no replacement.');

/**
 * Class HubMode
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self subscribe()
 * @method static self unsubscribe()
 *
 * @deprecated 0.5.3
 */
class HubMode extends Enum
{
    /**
     * @param string $value
     *
     * @return bool
     *
     * @deprecated 0.2.0
     * @see isValid
     */
    public static function isHubMode(string $value): bool
    {
        return static::isValid($value);
    }
}