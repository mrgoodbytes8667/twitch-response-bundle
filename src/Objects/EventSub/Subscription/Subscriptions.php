<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


use Bytes\TwitchResponseBundle\Objects\Traits\LimitTrait;
use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;
use Bytes\TwitchResponseBundle\Objects\Traits\TotalTrait;

/**
 * Class Subscriptions
 * Used for Creation response and Get EventSub Subscriptions
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 */
class Subscriptions
{
    use LimitTrait, TotalTrait, PaginationTrait;

    /**
     * @var Subscription[]|null
     */
    private $data = null;

    /**
     * @return Subscription[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Subscription[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return Subscription[]|null
     */
    public function getSubscriptions()
    {
        return $this->data;
    }

    /**
     * @return Subscription|null
     */
    public function getSubscription()
    {
        if(!array_key_exists('0', $this->data))
        {
            return null;
        }
        return $this->data[0];
    }
}