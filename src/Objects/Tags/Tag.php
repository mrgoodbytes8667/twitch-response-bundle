<?php


namespace Bytes\TwitchResponseBundle\Objects\Tags;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TagInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Tag
 * @package Bytes\TwitchResponseBundle\Objects\Tags
 *
 * @link https://dev.twitch.tv/docs/api/reference#get-all-stream-tags
 */
class Tag implements TagInterface
{
    /**
     * @var string|null
     */
    private $tag_id;

    /**
     * @var bool|null
     */
    #[SerializedName('is_auto')]
    private $auto;

    /**
     * @var string[]|null
     */
    private $localization_names;

    /**
     * @var string[]|null
     */
    private $localization_descriptions;

    /**
     * ID of the tag.
     * @return string|null
     */
    public function getTagId(): ?string
    {
        return $this->tag_id;
    }

    /**
     * ID of the tag.
     * @param string|null $tag_id
     * @return $this
     */
    public function setTagId(?string $tag_id): self
    {
        $this->tag_id = $tag_id;
        return $this;
    }

    /**
     * true if the tag is auto-generated; otherwise, false . An auto-generated tag is one automatically applied by Twitch (e.g., a language tag based on the broadcaster’s settings); these tags cannot be added or removed by the user.
     * @return bool|null
     */
    public function isAuto(): ?bool
    {
        return $this->auto;
    }

    /**
     * true if the tag is auto-generated; otherwise, false . An auto-generated tag is one automatically applied by Twitch (e.g., a language tag based on the broadcaster’s settings); these tags cannot be added or removed by the user.
     * @param bool|null $auto
     * @return $this
     */
    public function setAuto(?bool $auto): self
    {
        $this->auto = $auto;
        return $this;
    }

    /**
     * All localized names of the tag.
     * @return string[]|null
     */
    public function getLocalizationNames(): ?array
    {
        return $this->localization_names;
    }

    /**
     * All localized names of the tag.
     * @param string[]|null $localization_names
     * @return $this
     */
    public function setLocalizationNames(?array $localization_names): self
    {
        $this->localization_names = $localization_names;
        return $this;
    }

    /**
     * All localized descriptions of the tag.
     * @return string[]|null
     */
    public function getLocalizationDescriptions(): ?array
    {
        return $this->localization_descriptions;
    }

    /**
     * All localized descriptions of the tag.
     * @param string[]|null $localization_descriptions
     * @return $this
     */
    public function setLocalizationDescriptions(?array $localization_descriptions): self
    {
        $this->localization_descriptions = $localization_descriptions;
        return $this;
    }
}