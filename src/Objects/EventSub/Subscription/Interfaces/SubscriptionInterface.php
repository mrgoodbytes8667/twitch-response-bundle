<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Interfaces;


use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use DateTimeInterface;

/**
 * Interface SubscriptionInterface
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Interfaces
 */
interface SubscriptionInterface
{
    /**
     * @return string|null
     */
    public function getEventSubId(): ?string;

    /**
     * @return EventSubSubscriptionTypes|string
     */
    public function getType();

    /**
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * @return string|null
     */
    public function getCallback(): ?string;
}