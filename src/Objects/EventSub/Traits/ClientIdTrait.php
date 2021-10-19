<?php

namespace Bytes\TwitchResponseBundle\Objects\EventSub\Traits;

trait ClientIdTrait
{
    /**
     * @var string|null
     */
    private $client_id;

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    /**
     * @param string|null $client_id
     * @return $this
     */
    public function setClientId(?string $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }
}