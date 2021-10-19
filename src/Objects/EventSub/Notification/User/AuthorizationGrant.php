<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\AuthorizationGrant as UserAuthorizationGrantEvent;

/**
 * @method UserAuthorizationGrantEvent|null getEvent()
 */
class AuthorizationGrant extends Notification
{
    /**
     * @var UserAuthorizationGrantEvent
     */
    protected $event = null;
}