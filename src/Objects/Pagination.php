<?php


namespace Bytes\TwitchResponseBundle\Objects;


/**
 * Class Pagination
 * @package Bytes\TwitchResponseBundle\Objects
 */
class Pagination
{
    /**
     * @var string|null
     */
    protected $cursor;

    /**
     * @return string|null
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param string|null $cursor
     * @return $this
     */
    public function setCursor(?string $cursor): self
    {
        $this->cursor = $cursor;
        return $this;
    }

}