<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


use Bytes\TwitchResponseBundle\Objects\Pagination;

/**
 * Interface PaginationInterface
 * @package Bytes\TwitchResponseBundle\Objects\Interfaces
 */
interface PaginationInterface
{
    /**
     * @return Pagination|null
     */
    public function getPagination(): ?Pagination;

    /**
     * Sets pagination, but will set it to null even if an instance of Pagination is passed without a cursor!
     * @param Pagination|array|null $pagination
     * @return $this
     */
    public function setPagination($pagination);
}