<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;

use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\StreamTrait;

/**
 * Class StreamChanged
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 */
class StreamChanged implements TwitchDateTimeInterface
{
    use StreamTrait;

    /**
     * @var string[]|null
     * @deprecated No longer offered by Twitch
     */
    protected $community_ids;

    /**
     * @return string[]|null
     * @deprecated No longer offered by Twitch
     */
    public function getCommunityIds(): ?array
    {
        trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.2.0', 'Using "%s" is deprecated, there is no replacement.', __METHOD__);
        return $this->community_ids;
    }

    /**
     * @param string[]|null $community_ids
     * @return $this
     * @deprecated No longer offered by Twitch
     */
    public function setCommunityIds(?array $community_ids): self
    {
        trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.2.0', 'Using "%s" is deprecated, there is no replacement.', __METHOD__);
        $this->community_ids = $community_ids;
        return $this;
    }
}