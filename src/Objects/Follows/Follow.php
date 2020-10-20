<?php


namespace Bytes\TwitchResponseBundle\Objects\Follows;


use DateTime;
use DateTimeInterface;
use Exception;

/**
 * Class Follow
 * @package Bytes\TwitchResponseBundle\Objects\Follows
 */
class Follow
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
    public $followedAt;

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
        return $this->followedAt;
    }

    /**
     * @param DateTimeInterface|string|null $followedAt
     * @return $this
     * @throws Exception
     */
    public function setFollowedAt($followedAt)
    {
        if (is_string($followedAt)) {
            $this->followedAt = new DateTime($followedAt);
        } else {
            $this->followedAt = $followedAt;
        }
        return $this;
    }


}