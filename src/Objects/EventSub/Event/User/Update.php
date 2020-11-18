<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\User;


use Bytes\TwitchResponseBundle\Objects\EventSub\Event\AbstractEvent;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserTrait;

/**
 * Class Update
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Event\User
 */
class Update extends AbstractEvent
{
    use UserTrait;

    /**
     * @var string|null
     */
    protected ?string $email;

    /**
     * @var string|null
     */
    protected ?string $description;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}