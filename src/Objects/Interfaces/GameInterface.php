<?php

namespace Bytes\TwitchResponseBundle\Objects\Interfaces;

use Bytes\TwitchResponseBundle\Objects\ImageResize;

interface GameInterface
{
    /**
     * @return string|null
     */
    public function getGameID(): ?string;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @return string|null
     */
    public function getBoxArtURL(): ?string;

    /**
     * @param int $width
     * @param int $height
     * @return string
     */
    public function getBoxArtURLWithSize(int $width = ImageResize::WIDTH_TWITCH_GAME_THUMBNAIL, int $height = ImageResize::HEIGHT_TWITCH_GAME_THUMBNAIL): string;

    /**
     * @return string|null
     */
    public function getIgdbId(): ?string;
}