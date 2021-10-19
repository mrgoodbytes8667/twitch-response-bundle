<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification\User;


use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Notification;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\AuthorizationRevoke as UserAuthorizationRevokeEvent;

/**
 * @method UserAuthorizationRevokeEvent|null getEvent()
 */
class AuthorizationRevoke extends Notification
{
    /**
     * @var UserAuthorizationRevokeEvent
     */
    protected $event = null;
}