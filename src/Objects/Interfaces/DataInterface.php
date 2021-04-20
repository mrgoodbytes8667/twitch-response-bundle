<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


/**
 * Interface DataInterface
 * @package Bytes\TwitchResponseBundle\Objects\Interfaces
 */
interface DataInterface
{
    /**
     * @return array|null
     */
    public function getData(): ?array;

    /**
     * @param array|null $data
     * @return $this
     */
    public function setData(?array $data);
}