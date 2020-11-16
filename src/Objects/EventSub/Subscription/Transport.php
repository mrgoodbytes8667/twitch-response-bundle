<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Transport
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription
 */
class Transport
{
    /**
     * @var string
     */
    private string $method = 'webhook';

    /**
     * @var string
     * @Assert\Url()
     */
    private string $callback = '';

    /**
     * @var string|null
     */
    private ?string $secret = null;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallback(): string
    {
        return $this->callback;
    }

    /**
     * @param string $callback
     * @return $this
     */
    public function setCallback(string $callback): self
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     * @return $this
     */
    public function setSecret(?string $secret): self
    {
        $this->secret = $secret;
        return $this;
    }
}