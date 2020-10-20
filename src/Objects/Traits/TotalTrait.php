<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


/**
 * Trait TotalTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait TotalTrait
{

    /**
     * @var int
     */
    protected $total;

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return $this
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }

}