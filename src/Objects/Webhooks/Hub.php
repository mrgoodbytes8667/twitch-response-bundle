<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;


use DateTime;
use Exception;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Hub
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 */
class Hub
{
    /**
     * @var int[]|null
     * @SerializedName("ratelimit-limit")
     */
    private $rateLimitLimit;

    /**
     * @var int[]|null
     * @SerializedName("ratelimit-remaining")
     */
    private $rateLimitRemaining;

    /**
     * @var int[]|null
     * @SerializedName("ratelimit-reset")
     */
    private $rateLimitReset;

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        if (array_key_exists(0, $this->rateLimitLimit)) {
            return $this->rateLimitLimit[0];
        } else {
            return null;
        }
    }

    /**
     * @param int[]|null $rateLimitLimit
     * @return $this
     */
    public function setRateLimitLimit(?array $rateLimitLimit): self
    {
        $this->rateLimitLimit = $rateLimitLimit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRemaining(): ?int
    {
        if (array_key_exists(0, $this->rateLimitRemaining)) {
            return $this->rateLimitRemaining[0];
        } else {
            return null;
        }
    }

    /**
     * @param int[]|null $rateLimitRemaining
     * @return $this
     */
    public function setRateLimitRemaining(?array $rateLimitRemaining): self
    {
        $this->rateLimitRemaining = $rateLimitRemaining;
        return $this;
    }

    /**
     * @return DateTime|null
     * @throws Exception
     */
    public function getReset(): ?DateTime
    {
        if (array_key_exists(0, $this->rateLimitReset)) {
            $reset = new DateTime();
            $reset->setTimestamp($this->rateLimitReset[0]);
            return $reset;
        } else {
            return null;
        }
    }

    /**
     * @param int[]|null $rateLimitReset
     * @return $this
     */
    public function setRateLimitReset(?array $rateLimitReset): self
    {
        $this->rateLimitReset = $rateLimitReset;
        return $this;
    }


}