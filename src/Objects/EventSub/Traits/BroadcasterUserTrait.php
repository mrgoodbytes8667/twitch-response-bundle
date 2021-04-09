<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Traits;


/**
 * Trait BroadcastUserTrait
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Traits
 */
trait BroadcasterUserTrait
{
    /**
     * @var string|null
     */
    protected ?string $broadcaster_user_id = null;

    /**
     * @var string|null
     */
    protected ?string $broadcaster_user_name = null;

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
    public function getUserId(): ?string
    {
        return $this->broadcaster_user_id;
    }

    /**
     * @return string|null
     */
    public function getBroadcasterUserName(): ?string
    {
        return $this->broadcaster_user_name;
    }

    /**
     * @param string|null $broadcaster_user_name
     * @return $this
     */
    public function setBroadcasterUserName(?string $broadcaster_user_name): self
    {
        $this->broadcaster_user_name = $broadcaster_user_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->broadcaster_user_name;
    }
}