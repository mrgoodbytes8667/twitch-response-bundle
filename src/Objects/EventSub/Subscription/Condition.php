<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Condition
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference#conditions As of 2020-11-16
 */
class Condition
{
    /**
     * @var string|null
     * @Groups({"channel","stream","points_reward_add", "points_rewards_update", "points_reward_remove"})
     */
    private ?string $broadcaster_user_id = null;

    /**
     * @var string|null
     * @Groups({"points_rewards_update", "points_reward_remove"})
     */
    private ?string $reward_id = null;

    /**
     * @var string|null
     * @Groups({"user_authorization_revoke"})
     */
    private ?string $client_id = null;

    /**
     * @var string|null
     * @Groups({"user_update"})
     */
    private ?string $user_id = null;

    /**
     * @return string|null
     */
    public function getBroadcasterUserId(): ?string
    {
        return $this->broadcaster_user_id;
    }

    /**
     * @param string|null $broadcaster_user_id
     * @return $this
     */
    public function setBroadcasterUserId(?string $broadcaster_user_id): self
    {
        $this->broadcaster_user_id = $broadcaster_user_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRewardId(): ?string
    {
        return $this->reward_id;
    }

    /**
     * @param string|null $reward_id
     * @return $this
     */
    public function setRewardId(?string $reward_id): self
    {
        $this->reward_id = $reward_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    /**
     * @param string|null $client_id
     * @return $this
     */
    public function setClientId(?string $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    /**
     * @param string|null $user_id
     * @return $this
     */
    public function setUserId(?string $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }
}