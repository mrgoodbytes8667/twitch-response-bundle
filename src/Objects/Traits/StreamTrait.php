<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


use DateTimeInterface;

trait StreamTrait
{
    /**
     * @var string[]|null
     * @deprecated No longer offered by Twitch
     */
    protected $community_ids;

    /**
     * @var string
     */
    protected $game_id;

    /**
     * @var string
     */
    protected $game_name;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var DateTimeInterface
     */
    protected $started_at;

    /**
     * @var string[]|null
     */
    protected $tag_ids;

    /**
     * @var string
     */
    protected $thumbnail_url;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $user_name;

    /**
     * @var int
     */
    protected $viewer_count;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string[]|null
     * @deprecated No longer offered by Twitch
     */
    public function getCommunityIds(): ?array
    {
        return $this->community_ids;
    }

    /**
     * @param string[]|null $community_ids
     * @return $this
     * @deprecated No longer offered by Twitch
     */
    public function setCommunityIds(?array $community_ids): self
    {
        $this->community_ids = $community_ids;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return intval($this->game_id) ?? 0;
    }

    /**
     * @param string $game_id
     * @return $this
     */
    public function setGameId(string $game_id): self
    {
        $this->game_id = $game_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->game_name ?? '';
    }

    /**
     * @param string $game_name
     * @return $this
     */
    public function setGameName(string $game_name): self
    {
        $this->game_name = $game_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreamId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setStreamId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartedAt(): DateTimeInterface
    {
        return $this->started_at;
    }

    /**
     * @param DateTimeInterface $started_at
     * @return $this
     */
    public function setStartedAt(DateTimeInterface $started_at): self
    {
        $this->started_at = $started_at;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param string[]|null $tag_ids
     * @return $this
     */
    public function setTagIds(?array $tag_ids): self
    {
        $this->tag_ids = $tag_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->thumbnail_url;
    }

    /**
     * @param string $thumbnail_url
     * @return $this
     */
    public function setThumbnailUrl(string $thumbnail_url): self
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     * @return $this
     */
    public function setUserId(string $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     * @return $this
     */
    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getViewerCount(): int
    {
        return $this->viewer_count;
    }

    /**
     * @param int $viewer_count
     * @return $this
     */
    public function setViewerCount(int $viewer_count): self
    {
        $this->viewer_count = $viewer_count;
        return $this;
    }
}