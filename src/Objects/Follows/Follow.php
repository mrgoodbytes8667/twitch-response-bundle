<?php


namespace Bytes\TwitchResponseBundle\Objects\Follows;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use DateTimeInterface;

/**
 * Class Follow
 * @package Bytes\TwitchResponseBundle\Objects\Follows
 */
class Follow implements TwitchDateTimeInterface
{
    /**
     * @var int|null
     */
    public $fromID;

    /**
     * @var string|null
     */
    public $fromName;

    /**
     * @var int|null
     */
    public $toID;

    /**
     * @var string|null
     */
    public $toName;

    /**
     * @var DateTimeInterface|null
     */
    public $followed_at;

    /**
     * @return int|null
     */
    public function getFromID(): ?int
    {
        return $this->fromID;
    }

    /**
     * @param int|null $fromID
     * @return $this
     */
    public function setFromID(?int $fromID): self
    {
        $this->fromID = $fromID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * @param string|null $fromName
     * @return $this
     */
    public function setFromName(?string $fromName): self
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getToID(): ?int
    {
        return $this->toID;
    }

    /**
     * @param int|null $toID
     * @return $this
     */
    public function setToID(?int $toID): self
    {
        $this->toID = $toID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToName(): ?string
    {
        return $this->toName;
    }

    /**
     * @param string|null $toName
     * @return $this
     */
    public function setToName(?string $toName): self
    {
        $this->toName = $toName;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getFollowedAt()
    {
        return $this->followed_at;
    }

    /**
     * @param DateTimeInterface|null $followed_at
     * @return $this
     */
    public function setFollowedAt(?DateTimeInterface $followed_at)
    {
        $this->followed_at = $followed_at;
        return $this;
    }
}