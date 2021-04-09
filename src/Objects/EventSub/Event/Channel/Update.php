<?php


namespace Bytes\TwitchResponseBundle\Objects\EventSub\Event\Channel;


use Bytes\TwitchResponseBundle\Objects\EventSub\Event\AbstractEvent;
use Bytes\TwitchResponseBundle\Objects\EventSub\Traits\UserTrait;

/**
 * Class Update
 * @package Bytes\TwitchResponseBundle\Objects\EventSub\Event\Channel
 */
class Update extends AbstractEvent
{
    use UserTrait;

    /**
     * @var string|null
     */
    protected ?string $title = null;
    
    /**
     * @var string|null
     */
    protected ?string $language = null;
    
    /**
     * @var string|null
     */
    protected ?string $category_id = null;
    
    /**
     * @var string|null
     */
    protected ?string $category_name = null;
    
    /**
     * @var bool|null
     */
    protected ?bool $is_mature = null;

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
    public function getCategoryId(): ?string
    {
        return $this->category_id;
    }

    /**
     * @param string|null $category_id
     * @return $this
     */
    public function setCategoryId(?string $category_id): self
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    /**
     * @param string|null $category_name
     * @return $this
     */
    public function setCategoryName(?string $category_name): self
    {
        $this->category_name = $category_name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMature(): ?bool
    {
        return $this->is_mature;
    }

    /**
     * @param bool|null $is_mature
     * @return $this
     */
    public function setIsMature(?bool $is_mature): self
    {
        $this->is_mature = $is_mature;
        return $this;
    }
}