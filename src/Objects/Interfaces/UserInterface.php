<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


/**
 * Interface UserInterface
 * @package Bytes\TwitchResponseBundle\Objects\Interfaces
 */
interface UserInterface
{
    /**
     * @return string|null
     */
    public function getId(): ?string;

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id);

    /**
     * @return string|null
     */
    public function getLogin(): ?string;

    /**
     * @param string|null $login
     * @return $this
     */
    public function setLogin(?string $login);
}