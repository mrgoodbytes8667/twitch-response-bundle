<?php


namespace Bytes\TwitchResponseBundle\Objects\Games;


use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Game
 * @package Bytes\TwitchResponseBundle\Objects\Games
 */
class Game
{

    /**
     * @var string|int|null
     * @SerializedName("id")
     */
    private $gameID;

    /**
     * @var string|null
     */
    private ?string $name = '';

    /**
     * @var string|null
     */
    private ?string $boxArtURL = '';

    /**
     * @return int|null
     */
    public function getGameID(): ?int
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
     * @param string|null $boxArtURL
     * @return $this
     */
    public function setBoxArtURL(?string $boxArtURL): self
    {
        $this->boxArtURL = $boxArtURL;
        return $this;
    }


}