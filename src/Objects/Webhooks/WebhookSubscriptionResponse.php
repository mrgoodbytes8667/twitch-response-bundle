<?php


namespace Bytes\TwitchResponseBundle\Objects\Webhooks;

use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;

/**
 * Class WebhookSubscriptionResponse
 * @package Bytes\TwitchResponseBundle\Objects\Webhooks
 */
class WebhookSubscriptionResponse
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