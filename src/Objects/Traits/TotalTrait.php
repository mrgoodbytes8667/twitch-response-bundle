<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


/**
 * Trait TotalTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait TotalTrait
{

    /**
     * @var int|null
     */
    protected ?int $total = null;

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $total
     * @return $this
     */
    public function setTotal(?int $total): self
    {
        $this->total = $total;
        return $this;
    }


}