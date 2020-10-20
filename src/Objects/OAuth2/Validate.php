<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


/**
 * Class Validate
 * @package Bytes\TwitchResponseBundle\Objects\OAuth2
 */
class Validate
{
    /**
     * @var string|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $login;

    /**
     * @var string[]|null
     */
    private $scopes;

    /**
     * @var string|null
     */
    private $userId;

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param string|null $clientId
     * @return $this
     */
    public function setClientId(?string $clientId): self
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     * @return $this
     */
    public function setLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @param string[]|null $scopes
     * @return $this
     */
    public function setScopes(?array $scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return $this
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
}