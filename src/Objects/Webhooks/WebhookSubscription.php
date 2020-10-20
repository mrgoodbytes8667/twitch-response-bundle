<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;


use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class WebhookSubscription
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 */
class WebhookSubscription
{
    /**
     * @var string
     */
    protected $topic;

    /**
     * @var string
     */
    protected $callback;

    /**
     * @var DateTimeInterface
     * @SerializedName("expiresAt")
     */
    protected $expires_at;

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * @param string $topic
     * @return $this
     */
    public function setTopic(string $topic): self
    {
        $this->topic = $topic;
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
     * @return DateTimeInterface
     */
    public function getExpiresAt(): DateTimeInterface
    {
        return $this->expires_at;
    }

    /**
     * @param DateTimeInterface $expires_at
     * @return $this
     */
    public function setExpiresAt(DateTimeInterface $expires_at): self
    {
        $this->expires_at = $expires_at;
        return $this;
    }
}