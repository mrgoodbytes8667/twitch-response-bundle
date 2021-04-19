<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits\SubscriptionTrait;
use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;

/**
 * Class Subscription
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 */
class Subscription implements TwitchDateTimeInterface
{
    use SubscriptionTrait;
}