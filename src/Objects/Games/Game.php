<?php


namespace Bytes\TwitchResponseBundle\Objects\Games;


use Bytes\TwitchResponseBundle\Objects\ImageResize;
use Bytes\TwitchResponseBundle\Objects\Interfaces\GameInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Game
 * @package Bytes\TwitchResponseBundle\Objects\Games
 *
 * @link https://dev.twitch.tv/docs/api/reference/#get-games
 * @version As of 2023-04-28
 */
class Game implements GameInterface
{
    /**
     * @var string|int|null
     */
    #[SerializedName('id')]
    private $gameID;

    /**
     * @var string|null
     */
    private ?string $name = '';

    /**
     * @var string|null
     */
    #[SerializedName('box_art_url')]
    private ?string $boxArtURL = '';

    /**
     * @var string|null
     */
    #[SerializedName('igdb_id')]
    private ?string $igdbId = '';

    /**
     * @return string|null
     */
    public function getGameID(): ?string
    {
        return $this->gameID;
    }

    /**
     * @param string|int|null $gameID
     * @return $this
     */
    public function setGameID($gameID): self
    {
        $this->gameID = intval($gameID);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBoxArtURL(): ?string
    {
        return $this->boxArtURL;
    }

    /**
     * @param int $width
     * @param int $height
     * @return string
     */
    public function getBoxArtURLWithSize(int $width = ImageResize::WIDTH_TWITCH_GAME_THUMBNAIL, int $height = ImageResize::HEIGHT_TWITCH_GAME_THUMBNAIL): string
    {
        return ImageResize::twitchGameThumbnail(url: $this->boxArtURL ?? '', width: $width, height: $height);
    }

    /**
     * @param string|null $boxArtURL
     * @return $this
     */
    public function setBoxArtURL(?string $boxArtURL): self
    {
        $this->boxArtURL = $boxArtURL;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIgdbId(): ?string
    {
        return $this->igdbId;
    }

    /**
     * @param string|null $igdbId
     * @return $this
     */
    public function setIgdbId(?string $igdbId): self
    {
        $this->igdbId = $igdbId;
        return $this;
    }

    /**
     * @param int|string $gameId
     * @param string $name
     * @param string $boxArtUrl
     * @param string $igdbId
     * @return static
     */
    public static function make(int|string $gameId, string $name, string $boxArtUrl, string $igdbId = ''): static
    {
        $static = new static();
        $static->setGameID($gameId)
            ->setName($name)
            ->setBoxArtURL($boxArtUrl)
        ->setIgdbId($igdbId);
        return $static;
    }

    /**
     * @param int|null $width
     * @param int|null $height
     * @return string|null
     */
    #[Ignore]
    public function getProfileImage(?int $width = ImageResize::WIDTH_TWITCH_GAME_THUMBNAIL, ?int $height = ImageResize::HEIGHT_TWITCH_GAME_THUMBNAIL): ?string
    {
        return $this->getBoxArtURLWithSize(width: $width, height: $height);
    }
}
