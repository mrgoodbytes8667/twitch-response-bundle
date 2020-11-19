<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits;

use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Transport;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Trait SubscriptionTrait
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Traits
 */
trait SubscriptionTrait
{
    use IdTrait;

    /**
     * @var string|null
     */
    protected ?string $status = null;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $version = '1';

    /**
     * @var Condition|null
     */
    protected ?Condition $condition = null;

    /**
     * @var Transport|null
     */
    protected ?Transport $transport = null;

    /**
     * @var \DateTimeInterface|null
     * @SerializedName("created_at")
     */
    protected $createdAt = null;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return Condition|null
     */
    public function getCondition(): ?Condition
    {
        return $this->condition;
    }

    /**
     * @param Condition|null $condition
     * @return $this
     */
    public function setCondition(?Condition $condition): self
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * @return Transport|null
     */
    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    /**
     * @param Transport|null $transport
     * @return $this
     */
    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface|string|null $createdAt
     * @return $this
     */
    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}