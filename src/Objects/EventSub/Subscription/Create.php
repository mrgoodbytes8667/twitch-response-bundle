<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;


use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits\SubscriptionTrait;
use InvalidArgumentException;

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
     * @param Condition|string[] $conditions = ['broadcasterUserId' => '', 'userId' => '', 'rewardId' => '', 'clientId' => '']
     * @param string $callback
     * @param string $secret
     * @param EventSubTransportMethod|null $method
     * @return static
     */
    public static function create(EventSubSubscriptionTypes $type, $conditions, string $callback, string $secret, ?EventSubTransportMethod $method = null)
    {
        $transport = Transport::create($callback, $secret, $method);
        if ($conditions instanceof Condition) {
            $condition = $conditions;
        } elseif (is_array($conditions)) {
            $condition = Condition::createFromArray($conditions);
        } else {
            throw new InvalidArgumentException('Conditions argument must be an array or a Condition object');
        }

        $static = new static();
        $static->setType($type);
        $static->setCondition($condition);
        $static->setTransport($transport);

        return $static;
    }
}