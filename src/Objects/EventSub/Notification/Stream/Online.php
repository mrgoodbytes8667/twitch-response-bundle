<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream\Online as StreamOnlineEvent;

/**
 * Class Online
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream
 */
class Online extends Notification
{
    /**
     * @var StreamOnlineEvent
     */
    protected $event = null;
}