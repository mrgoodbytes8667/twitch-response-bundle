<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\Update as UserUpdateEvent;

/**
 * Class Update
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User
 */
class Update extends Notification
{
    /**
     * @var UserUpdateEvent
     */
    protected $event = null;
}