<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Class EventSubSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
class EventSubSignature extends AbstractSignature implements SignatureInterface
{
    const SIGNATURE_FIELD = 'twitch-eventsub-message-signature';
    const TWITCH_EVENTSUB_MESSAGE_ID = 'twitch-eventsub-message-id';
    const TWITCH_EVENTSUB_MESSAGE_TIMESTAMP = 'twitch-eventsub-message-timestamp';

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