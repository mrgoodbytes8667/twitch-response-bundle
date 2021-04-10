<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


/**
 * Trait LimitTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait LimitTrait
{
    /**
     * @var int|null
     */
    protected ?int $limit = null;

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     * @return $this
     */
    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }


}