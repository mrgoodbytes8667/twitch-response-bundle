<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits;


/**
 * Trait IdTrait
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits
 */
trait IdTrait
{
    /**
     * @var string|null
     */
    protected ?string $id = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}