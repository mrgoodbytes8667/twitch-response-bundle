<?php


namespace Bytes\TwitchResponseBundle\Objects\Videos;


use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @link https://dev.twitch.tv/docs/api/reference#get-videos
 */
class Video
{
    /**
     * @var string|null
     * @SerializedName("id")
     */
    private $videoId;

    /**
     * @var string|null
     */
    private $stream_id;

    /**
     * @var string|null
     */
    private $user_id;

    /**
     * @var string|null
     */
    private $user_login;

    /**
     * @var string|null
     */
    private $user_name;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var DateTimeInterface|null
     */
    private $created_at;

    /**
     * @var DateTimeInterface|null
     */
    private $published_at;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $thumbnail_url;

    /**
     * @var string|null
     */
    private $viewable;

    /**
     * @var int|null
     */
    private $view_count;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $duration;

    /**
     * @return string|null
     */
    public function getVideoId(): ?string
    {
        return $this->videoId;
    }

    /**
     * @param string|null $videoId
     * @return $this
     */
    public function setVideoId(?string $videoId): self
    {
        $this->videoId = $videoId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreamId(): ?string
    {
        return $this->stream_id;
    }

    /**
     * @param string|null $stream_id
     * @return $this
     */
    public function setStreamId(?string $stream_id): self
    {
        $this->stream_id = $stream_id;
        return $this;
    }

    /**
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
     * @return string|null
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param string|null $user_login
     * @return $this
     */
    public function setUserLogin(?string $user_login): self
    {
        $this->user_login = $user_login;
        return $this;
    }

    /**
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * @param DateTimeInterface|null $created_at
     * @return $this
     */
    public function setCreatedAt(?DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPublishedAt(): ?DateTimeInterface
    {
        return $this->published_at;
    }

    /**
     * @param DateTimeInterface|null $published_at
     * @return $this
     */
    public function setPublishedAt(?DateTimeInterface $published_at): self
    {
        $this->published_at = $published_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
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
     * @return string|null
     */
    public function getViewable(): ?string
    {
        return $this->viewable;
    }

    /**
     * @param string|null $viewable
     * @return $this
     */
    public function setViewable(?string $viewable): self
    {
        $this->viewable = $viewable;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getViewCount(): ?int
    {
        return $this->view_count;
    }

    /**
     * @param int|null $view_count
     * @return $this
     */
    public function setViewCount(?int $view_count): self
    {
        $this->view_count = $view_count;
        return $this;
    }

    /**
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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * @param string|null $duration
     * @return $this
     */
    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
}
