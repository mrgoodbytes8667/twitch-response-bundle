<?php


namespace Bytes\TwitchResponseBundle\Objects\Traits;


use DateTimeInterface;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Trait StreamTrait
 * @package Bytes\TwitchResponseBundle\Objects\Traits
 */
trait StreamTrait
{
    /**
     * @var string|null
     */
    protected $game_id;

    /**
     * @var string|null
     */
    protected $game_name;

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $language;

    /**
     * @var DateTimeInterface|null
     */
    protected $started_at;

    /**
     * @var string|null[]|null
     */
    #[Deprecated('Since mrgoodbytes8667/0.6.1|February 28, 2023, this field is deprecated')]
    protected $tag_ids;

    /**
     * @var string[]
     */
    protected array $tags = [];

    /**
     * @var string|null
     */
    protected $thumbnail_url;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $user_id;

    /**
     * Login of the user who is streaming.
     * @var string|null
     */
    protected $user_login;

    /**
     * @var string|null
     */
    protected $user_name;

    /**
     * @var int|null
     */
    protected $viewer_count;

    /**
     * Indicates if the broadcaster has specified their channel contains mature content that may be inappropriate for younger audiences.
     * @var bool|null
     */
    #[SerializedName('is_mature')]
    protected $mature;

    /**
     * Stream ID.
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * ID of the game being played on the stream.
     * @return string
     */
    public function getGameId(): string
    {
        return intval($this->game_id) ?? 0;
    }

    /**
     * @param string|null $game_id
     * @return $this
     */
    public function setGameId(?string $game_id): self
    {
        $this->game_id = $game_id;
        return $this;
    }

    /**
     * Name of the game being played.
     * @return string
     */
    public function getGameName(): string
    {
        return $this->game_name ?? '';
    }

    /**
     * @param string|null $game_name
     * @return $this
     */
    public function setGameName(?string $game_name): self
    {
        $this->game_name = $game_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreamId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setStreamId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Stream language. A language value is either the ISO 639-1 two-letter code for a supported stream language or “other”.
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return $this
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * UTC timestamp.
     * @return DateTimeInterface|null
     */
    public function getStartedAt(): ?DateTimeInterface
    {
        return $this->started_at;
    }

    /**
     * @param DateTimeInterface|null $started_at
     * @return $this
     */
    public function setStartedAt(?DateTimeInterface $started_at): self
    {
        $this->started_at = $started_at;
        return $this;
    }

    /**
     * Shows tag IDs that apply to the stream.
     * @return string[]|null
     */
    #[Deprecated('Since mrgoodbytes8667/0.6.1|February 28, 2023, this field is deprecated', '%class%->getTags()')]
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param string[]|null $tag_ids
     * @return $this
     */
    #[Deprecated('Since mrgoodbytes8667/0.6.1|February 28, 2023, this field is deprecated')]
    public function setTagIds(?array $tag_ids): self
    {
        $this->tag_ids = $tag_ids;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags
     * @return $this
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * 	Thumbnail URL of the stream. All image URLs have variable width and height. You can replace {width} and {height} with any values to get that size image
     * @return string|null
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnail_url;
    }

    /**
     * @param string|null $thumbnail_url
     * @return $this
     */
    public function setThumbnailUrl(?string $thumbnail_url): self
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * Stream title.
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Stream type: "live" or "" (in case of error).
     * @return string|null = ['live', ''][$any]
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type = ['live', ''][$any]
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * ID of the user who is streaming.
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    /**
     * @param string|null $user_id
     * @return $this
     */
    public function setUserId(?string $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * Login of the user who is streaming.
     * @return string|null
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param string|null $userLogin
     * @return $this
     */
    public function setUserLogin(?string $userLogin): self
    {
        $this->user_login = $userLogin;
        return $this;
    }

    /**
     * Display name corresponding to user_id.
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    /**
     * @param string|null $user_name
     * @return $this
     */
    public function setUserName(?string $user_name): self
    {
        $this->user_name = $user_name;
        return $this;
    }

    /**
     * Number of viewers watching the stream at the time of the query.
     * @return int
     */
    public function getViewerCount(): int
    {
        return $this->viewer_count ?? 0;
    }

    /**
     * @param int|null $viewer_count
     * @return $this
     */
    public function setViewerCount(?int $viewer_count): self
    {
        $this->viewer_count = $viewer_count;
        return $this;
    }

    /**
     * Indicates if the broadcaster has specified their channel contains mature content that may be inappropriate for younger audiences.
     * @return bool|null
     */
    public function isMature(): ?bool
    {
        return $this->mature;
    }

    /**
     * @param bool|null $mature
     * @return $this
     */
    public function setMature(?bool $mature): self
    {
        $this->mature = $mature;
        return $this;
    }
}