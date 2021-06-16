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

    /**
     * @var int|null
     */
    private $cost;

    /**
     * @return int|null
     */
    public function getCost(): ?int
    {
        return $this->cost;
    }

    /**
     * @param int|null $cost
     * @return $this
     */
    public function setCost(?int $cost): self
    {
        $this->cost = $cost;
        return $this;
    }
}