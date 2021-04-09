<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription;

use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
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
     * @param string $callback
     * @param string|null $secret
     * @param EventSubTransportMethod|null $method
     * @return static
     */
    public static function create(string $callback, ?string $secret = null, ?EventSubTransportMethod $method = null)
    {
        if (is_null($method)) {
            $method = EventSubTransportMethod::webhook();
        }
        $static = new static();
        $static->setCallback($callback);
        $static->setMethod($method->value);
        if (!empty($secret)) {
            $static->setSecret($secret);
        }

        return $static;
    }

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