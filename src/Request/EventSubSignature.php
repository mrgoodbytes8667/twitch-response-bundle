<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Class EventSubSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
class EventSubSignature extends AbstractSignature implements SignatureInterface
{
    /**
     * @var string
     */
    const SIGNATURE_FIELD = 'twitch-eventsub-message-signature';
    
    /**
     * @var string
     */
    const TWITCH_EVENTSUB_MESSAGE_ID = 'twitch-eventsub-message-id';
    
    /**
     * @var string
     */
    const TWITCH_EVENTSUB_MESSAGE_TIMESTAMP = 'twitch-eventsub-message-timestamp';

    /**
     * Return the locator name
     * @return string
     */
    public static function getDefaultIndexName(): string
    {
        return 'EVENTSUB';
    }

    /**
     * @param HeaderBag $headers
     * @param bool|string|null $content
     * @return string
     */
    protected function getHashString(HeaderBag $headers, bool|string|null $content): string
    {
        return $headers->get(self::TWITCH_EVENTSUB_MESSAGE_ID) . $headers->get(self::TWITCH_EVENTSUB_MESSAGE_TIMESTAMP) . $content;
    }
}