<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


/**
 * Trait ErrorTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait ErrorTrait
{
    /**
     * @var int|null
     */
    protected ?int $status = null;

    /**
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     * @return $this
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }
}