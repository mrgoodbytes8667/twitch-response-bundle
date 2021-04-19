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
     * Sets pagination, but will set it to null even if an instance of Pagination is passed without a cursor!
     * @param Pagination|array|null $pagination
     * @return $this
     *
     * @todo Figure out why this is needing to be "hacky" like this, this worked normally prior to Symfony 5
     */
    public function setPagination($pagination): self
    {
        if (empty($pagination)) {
            $this->pagination = null;
        } elseif (is_array($pagination)) {
            $this->pagination = Pagination::make($pagination['cursor']);
        } elseif ($pagination instanceof Pagination && empty($pagination->getCursor())) {
            $this->pagination = null;
        } else {
            $this->pagination = $pagination;
        }
        return $this;
    }

}