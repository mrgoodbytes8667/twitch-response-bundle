<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;


use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.5.1', 'The "\Bytes\TwitchResponseBundle\Objects\Webhooks\WebhookHeader" class is deprecated, there is no replacement.');

/**
 * Class WebhookHeader
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 *
 * @deprecated since 0.5.1. This functionality is no longer provided by Twitch and will be removed in the next version.
 */
class WebhookHeader
{
    /**
     * @var string
     * @SerializedName("twitchNotificationID")
     */
    protected $twitch_notification_id;

    /**
     * @var string|null
     */
    protected $twitch_notification_retry;

    /**
     * @var DateTimeInterface
     */
    protected $twitch_notification_timestamp;

    /**
     * @var string
     */
    protected $x_hub_signature;

    /**
     * @var string
     */
    protected $link;

    /**
     * @return string|null
     */
    public function getTwitchNotificationId(): ?string
    {
        return $this->twitch_notification_id;
    }

    /**
     * @param string|null $twitch_notification_id
     * @return $this
     */
    public function setTwitchNotificationId(?string $twitch_notification_id): self
    {
        $this->twitch_notification_id = $twitch_notification_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTwitchNotificationRetry()
    {
        return (int)$this->twitch_notification_retry ?? 0;
    }

    /**
     * @param string|null $twitch_notification_retry
     * @return $this
     */
    public function setTwitchNotificationRetry(?string $twitch_notification_retry): self
    {
        $this->twitch_notification_retry = $twitch_notification_retry;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTwitchNotificationTimestamp(): ?DateTimeInterface
    {
        return $this->twitch_notification_timestamp;
    }

    /**
     * @param DateTimeInterface|null $twitch_notification_timestamp
     * @return $this
     */
    public function setTwitchNotificationTimestamp(?DateTimeInterface $twitch_notification_timestamp): self
    {
        $this->twitch_notification_timestamp = $twitch_notification_timestamp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getXHubSignature(): ?string
    {
        return $this->x_hub_signature;
    }

    /**
     * @param string|null $x_hub_signature
     * @return $this
     */
    public function setXHubSignature(?string $x_hub_signature): self
    {
        $this->x_hub_signature = $x_hub_signature;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return $this
     */
    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }
}