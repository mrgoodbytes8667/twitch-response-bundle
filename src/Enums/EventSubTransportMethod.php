<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class EventSubTransportMethod
 * @package Bytes\TwitchResponseBundle\Enums
 */
enum EventSubTransportMethod: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case WEBHOOK = 'webhook';

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::WEBHOOK')]
    public static function webhook(): EventSubTransportMethod
    {
        return EventSubTransportMethod::WEBHOOK;
    }
}
