<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;

use Illuminate\Support\Str;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Condition
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference#conditions As of 2020-11-16
 *
 * @todo Do groups need to move to the get methods as well?
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
     * @SerializedName("broadcaster_user_id")
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
     * @SerializedName("reward_id")
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
     * @SerializedName("client_id")
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
     * @SerializedName("user_id")
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

    /**
     * Gets the broadcaster or user id
     * @return string|null
     */
    public function getBroadcasterOrUserId()
    {
        return $this->getBroadcasterUserId() ?? $this->getUserId();
    }

    /**
     * @param string[] $array = ['broadcasterUserId' => '', 'userId' => '', 'rewardId' => '', 'clientId' => '']
     * @return static
     */
    public static function createFromArray(array $array)
    {
        $static = new static();
        foreach ($array as $key => $value)
        {
            switch (Str::snake($key)){
                case 'broadcaster_user_id':
                    $static->setBroadcasterUserId($value);
                    break;
                case 'user_id':
                    $static->setUserId($value);
                    break;
                case 'reward_id':
                    $static->setRewardId($value);
                    break;
                case 'client_id':
                    $static->setClientId($value);
                    break;
                default:
                    throw new \InvalidArgumentException($key . ' is not a valid argument');
                    break;
            }
        }

        return $static;
    }
}