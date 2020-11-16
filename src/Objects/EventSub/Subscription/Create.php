<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


use Bytes\TwitchResponseBundle\Enums\Twitch\EventSub\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\Twitch\EventSub\EventSubTransportMethod;
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

    /**
     * @param EventSubSubscriptionTypes $type
     * @param array $conditions
     * @param string $callback
     * @param string $secret
     * @param EventSubTransportMethod|null $method
     * @return static
     */
    public static function create(EventSubSubscriptionTypes $type, array $conditions, string $callback, string $secret, ?EventSubTransportMethod $method = null)
    {
        $transport = Transport::create($callback, $secret, $method);
        $condition = Condition::createFromArray($conditions);

        $static = new static();
        $static->setType($type);
        $static->setCondition($condition);
        $static->setTransport($transport);

        return $static;
    }
}