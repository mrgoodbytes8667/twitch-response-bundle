<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


/**
 * Interface TwitchUserInterface
 * @package Pipsqueek\AlertsBundle\Interfaces
 */
interface UserIdInterface
{
    /**
     * @return string|null
     */
    public function getUserId(): ?string;
}