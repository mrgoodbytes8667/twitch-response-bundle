<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Notification;


use Bytes\TwitchResponseBundle\Objects\EventSub\Event\EventInterface;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;

/**
 * Class Notification
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Notification
 */
class Notification
{
    /**
     * @var Subscription|null
     */
    protected ?Subscription $subscription = null;

    /**
     * @var EventInterface|null
     */
    protected $event = null;

    /**
     * @return Subscription|null
     */
    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    /**
     * @param Subscription|null $subscription
     * @return $this
     */
    public function setSubscription(?Subscription $subscription): self
    {
        $this->subscription = $subscription;
        return $this;
    }

    /**
     * @return EventInterface|null
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param EventInterface|null $event
     * @return $this
     */
    public function setEvent($event): self
    {
        $this->event = $event;
        return $this;
    }


}