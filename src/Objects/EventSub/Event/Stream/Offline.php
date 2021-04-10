<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream;


use Bytes\TwitchResponseBundle\Objects\EventSub\Event\AbstractEvent;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\BroadcasterUserTrait;

/**
 * Class Offline
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference/#stream-offline-event
 */
class Offline extends AbstractEvent
{
    use BroadcasterUserTrait;
}