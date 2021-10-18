<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;

use Bytes\TwitchResponseBundle\Objects\Interfaces\DataPaginationResponseInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.5.1', 'The "\Bytes\TwitchResponseBundle\Objects\Webhooks\WebhookSubscriptionResponse" class is deprecated, there is no replacement.');

/**
 * Class WebhookSubscriptionResponse
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 *
 * @deprecated since 0.5.1. This functionality is no longer provided by Twitch and will be removed in the next version.
 */
class WebhookSubscriptionResponse implements DataPaginationResponseInterface
{
    use PaginationTrait;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var WebhookSubscription[]|null
     */
    public $data;

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return WebhookSubscriptionResponse
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return WebhookSubscription[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param WebhookSubscription[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}