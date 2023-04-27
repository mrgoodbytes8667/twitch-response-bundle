<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


/**
 * Class Callback
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 */
class Callback
{
    private string $challenge;
    
    private Subscription $subscription;

    /**
     * @return string
     */
    public function getChallenge(): string
    {
        return $this->challenge;
    }

    /**
     * @param string $challenge
     * @return $this
     */
    public function setChallenge(string $challenge): self
    {
        $this->challenge = $challenge;
        return $this;
    }

    /**
     * @return Subscription
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    /**
     * @param Subscription $subscription
     * @return $this
     */
    public function setSubscription(Subscription $subscription): self
    {
        $this->subscription = $subscription;
        return $this;
    }


}