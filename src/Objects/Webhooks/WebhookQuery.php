<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;


use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

/**
 * Class WebhookQuery
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 */
class WebhookQuery
{
    /**
     * @var string
     */
    protected $hub_challenge;
    /**
     * @var string|null
     */
    protected $hub_reason;

    /**
     * @var string
     */
    protected $hub_lease_seconds;

    /**
     * @var string
     */
    protected $hub_mode;

    /**
     * @var string
     */
    protected $hub_topic;

    /**
     * @var DateTimeImmutable
     */
    private $now;

    /**
     * WebhookQuery constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->now = new DateTimeImmutable();
    }

    /**
     * @return string|null
     */
    public function getHubChallenge(): ?string
    {
        return $this->hub_challenge;
    }

    /**
     * @param string|null $hub_challenge
     * @return $this
     */
    public function setHubChallenge(?string $hub_challenge): self
    {
        $this->hub_challenge = $hub_challenge;
        return $this;
    }

    /**
     * @return string
     */
    public function getHubReason(): string
    {
        return $this->hub_reason ?? '';
    }

    /**
     * @param string|null $hub_reason
     * @return $this
     */
    public function setHubReason(?string $hub_reason): self
    {
        $this->hub_reason = $hub_reason ?? '';
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHubLeaseSeconds(): ?int
    {
        return $this->hub_lease_seconds;
    }

    /**
     * @param string|int|null $hub_lease_seconds
     * @return $this
     */
    public function setHubLeaseSeconds($hub_lease_seconds): self
    {
        $this->hub_lease_seconds = $hub_lease_seconds;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     * @throws Exception
     */
    public function getHubLeaseExpiry(): ?DateTimeInterface
    {
        if (empty($this->hub_lease_seconds)) {
            return null;
        }
        $expiry = $this->now->add($this->getHubLeaseDateInterval());
        return $expiry;
    }

    /**
     * @return DateInterval|null
     * @throws Exception
     */
    public function getHubLeaseDateInterval(): ?DateInterval
    {
        if (empty($this->hub_lease_seconds)) {
            return null;
        }
        $interval = new DateInterval(sprintf('PT%dS', $this->hub_lease_seconds));
        return $interval;
    }

    /**
     * @return string|null
     */
    public function getHubMode(): ?string
    {
        return $this->hub_mode;
    }

    /**
     * @param string|null $hub_mode
     * @return $this
     */
    public function setHubMode(?string $hub_mode): self
    {
        $this->hub_mode = $hub_mode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHubTopic(): ?string
    {
        return $this->hub_topic;
    }

    /**
     * @param string|null $hub_topic
     * @return $this
     */
    public function setHubTopic(?string $hub_topic): self
    {
        $this->hub_topic = $hub_topic;
        return $this;
    }


}