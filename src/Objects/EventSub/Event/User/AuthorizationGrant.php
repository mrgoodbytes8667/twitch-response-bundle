<?php

namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\User;

use Bytes\TwitchResponseBundle\Objects\EventSub\Event\AbstractEvent;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\ClientIdTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserLoginTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserTrait;

/**
 * User Authorization Grant Event
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference/#user-authorization-grant-event
 */
class AuthorizationGrant extends AbstractEvent
{
    use UserTrait, ClientIdTrait, UserLoginTrait;
}