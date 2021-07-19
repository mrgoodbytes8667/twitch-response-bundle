<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Channel;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Channel\Update as ChannelUpdateEvent;

/**
 * Class Update
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Channel
 *
 * @method ChannelUpdateEvent|null getEvent()
 */
class Update extends Notification
{
    /**
     * @var ChannelUpdateEvent
     */
    protected $event = null;
}