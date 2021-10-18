<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;


use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.5.2', 'The "\Bytes\TwitchResponseBundle\Objects\Webhooks\WebhookSubscription" class is deprecated, there is no replacement.');

/**
 * Class WebhookSubscription
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 *
 * @deprecated since 0.5.2. This functionality is no longer provided by Twitch and will be removed in the next version.
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