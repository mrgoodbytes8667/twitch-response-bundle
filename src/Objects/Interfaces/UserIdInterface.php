<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.4.5', 'Using "Bytes\TwitchResponseBundle\Objects\Interfaces\UserIdInterface" is deprecated, use "Bytes\ResponseBundle\Interfaces\UserIdInterface" instead.');

/**
 * Interface TwitchUserInterface
 * @package Bytes\TwitchResponseBundle\Objects\Interfaces
 *
 * @deprecated Since 0.4.5, using "Bytes\TwitchResponseBundle\Objects\Interfaces\UserIdInterface" is deprecated, use "Bytes\ResponseBundle\Interfaces\UserIdInterface" instead.
 */
interface UserIdInterface
{
    /**
     * @return string|null
     */
    public function getUserId(): ?string;
}