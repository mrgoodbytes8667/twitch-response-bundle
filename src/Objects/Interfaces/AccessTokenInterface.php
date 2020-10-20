<?php


namespace Bytes\TwitchResponseBundle\Objects\Interfaces;


use DateInterval;

/**
 * Interface AccessTokenInterface
 * @package Bytes\TwitchResponseBundle\Objects\Interfaces
 */
interface AccessTokenInterface
{
    /**
     * @return string|null
     */
    public function getAccessToken(): ?string;

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string;

    /**
     * @return DateInterval|int|null
     */
    public function getExpiresIn();

    /**
     * @return string[]|string|null
     */
    public function getScope();

    /**
     * @return string|null
     */
    public function getTokenType(): ?string;
}