<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class StreamType
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.1.4
 */
enum StreamType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case LIVE = 'live';
    case OFFLINE = 'offline';

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::LIVE')]
    public static function live(): StreamType
    {
        return StreamType::LIVE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::OFFLINE')]
    public static function offline(): StreamType
    {
        return StreamType::OFFLINE;
    }
}
