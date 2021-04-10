<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream\Offline as StreamOfflineEvent;

/**
 * Class Offline
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream
 */
class Offline extends Notification
{
    /**
     * @var StreamOfflineEvent
     */
    protected $event = null;
}