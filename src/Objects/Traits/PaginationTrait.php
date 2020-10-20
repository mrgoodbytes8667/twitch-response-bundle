<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


use Bytes\TwitchResponseBundle\Objects\Pagination;

/**
 * Trait PaginationTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait PaginationTrait
{

    /**
     * @var Pagination|array|null
     */
    protected $pagination;

    /**
     * @return Pagination|null
     */
    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }

    /**
     * @param Pagination|array|null $pagination
     * @return PaginationTrait
     *
     * @todo Figure out why this is needing to be "hacky" like this, this worked normally prior to Symfony 5
     */
    public function setPagination($pagination): self
    {
        if (!empty($pagination)) {
            $temp = new Pagination();
            $temp->setCursor($pagination['cursor']);
            $this->pagination = $temp;
        }
        return $this;
    }

}