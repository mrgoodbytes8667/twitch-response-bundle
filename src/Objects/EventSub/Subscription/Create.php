<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits\SubscriptionTrait;

/**
 * Class Create
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 *
 * @link https://dev.twitch.tv/docs/eventsub/helix-endpoints#create-eventsub-subscription
 */
class Create
{
    use SubscriptionTrait;
}