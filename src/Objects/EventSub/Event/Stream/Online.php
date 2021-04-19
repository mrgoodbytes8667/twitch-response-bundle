<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;

/**
 * Class Online
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Event\Stream
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-reference/#stream-online-event
 */
class Online extends Offline implements TwitchDateTimeInterface
{
    /**
     * @var string|null The event id.
     */
    protected ?string $id = null;

    /**
     * The stream type. Valid values are: live, playlist, watch_party, premiere, rerun.
     * @var string|null ['live', 'playlist', 'watch_party', 'premiere', 'rerun'][$any]
     */
    protected ?string $type = null;

    protected ?\DateTimeInterface $started_at = null;

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

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->started_at;
    }

    /**
     * @param \DateTimeInterface|null $started_at
     * @return $this
     */
    public function setStartedAt(?\DateTimeInterface $started_at): self
    {
        $this->started_at = $started_at;
        return $this;
    }


}