<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class HubMode
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self subscribe()
 * @method static self unsubscribe()
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