<?php

namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\User;

use Bytes\TwitchResponseBundle\Objects\EventSub\Event\AbstractEvent;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\ClientIdTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserLoginTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserTrait;

/**
 * User Authorization Revoke Event
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference/#user-authorization-revoke-event
 */
class AuthorizationRevoke extends AbstractEvent
{
    use UserTrait, ClientIdTrait, UserLoginTrait;
}