<?php

namespace Bytes\TwitchResponseBundle\Objects\Interfaces;

/**
 * Covers classes that return Twitch User information
 */
interface TwitchUserInterface
{
    /**
     * ID of the user who is streaming.
     * @return string|null
     */
    public function getUserId(): ?string;

    /**
     * Login of the user who is streaming.
     * @return string|null
     */
    public function getUserLogin(): ?string;

    /**
     * Display name corresponding to user_id.
     * @return string|null
     */
    public function getUserName(): ?string;
}
