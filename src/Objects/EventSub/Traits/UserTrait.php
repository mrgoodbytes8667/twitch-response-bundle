<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Traits;


/**
 * Trait UserTrait
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Traits
 */
trait UserTrait
{
    /**
     * @var string|null
     */
    protected ?string $user_id;

    /**
     * @var string|null
     */
    protected ?string $user_name;

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

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    /**
     * @param string|null $user_name
     * @return $this
     */
    public function setUserName(?string $user_name): self
    {
        $this->user_name = $user_name;
        return $this;
    }
}