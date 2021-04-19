<?php


namespace Bytes\TwitchResponseBundle\Objects;


/**
 * Class Pagination
 * @package Bytes\TwitchResponseBundle\Objects
 */
class Pagination
{
    /**
     * Pagination constructor.
     * @param string|null $cursor
     */
    public function __construct(protected ?string $cursor = null)
    {
    }

    /**
     * @param string|null $cursor
     * @return static|null
     */
    public static function make(?string $cursor = null): ?static
    {
        if (empty($cursor)) {
            return null;
        }
        return new static($cursor);
    }

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