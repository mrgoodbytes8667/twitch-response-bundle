<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream;


/**
 * Class Online
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference/#stream-online-event
 */
class Online extends Offline
{
    /**
     * @var string|null The event id.
     */
    protected ?string $id;

    /**
     * @var string|null The stream type. Valid values are: live, playlist, watch_party, premiere, rerun.
     */
    protected ?string $type;

    /**
     * @return string|null The event id.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id The event id.
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null The stream type. Valid values are: live, playlist, watch_party, premiere, rerun.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type The stream type. Valid values are: live, playlist, watch_party, premiere, rerun.
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }
}