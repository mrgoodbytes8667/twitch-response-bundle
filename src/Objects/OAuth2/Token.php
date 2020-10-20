<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


use Bytes\TwitchResponseBundle\Objects\Interfaces\AccessTokenInterface;

/**
 * Class Token
 * @package Bytes\TwitchResponseBundle\Objects\OAuth2
 *
 * {
 *   "access_token": "<user access token>",
 *   "refresh_token": "<refresh token>",
 *   "expires_in": <number of seconds until the token expires>,
 *   "scope": ["<your previously listed scope(s)>"],
 *   "token_type": "bearer"
 * }
 */
class Token implements AccessTokenInterface
{

    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * @var string|null
     */
    private $refreshToken;

    /**
     * @var int|null
     */
    private $expiresIn;

    /**
     * @var string[]|null
     */
    private $scope;

    /**
     * @var string|null
     */
    private $tokenType;

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param string|null $accessToken
     * @return $this
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * @param string|null $refreshToken
     * @return $this
     */
    public function setRefreshToken(?string $refreshToken): self
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @param int|null $expiresIn
     * @return $this
     */
    public function setExpiresIn(?int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getScope(): ?array
    {
        return $this->scope;
    }

    /**
     * @param string[]|string|null $scope
     * @return $this
     */
    public function setScope($scope): self
    {
        if (!is_array($scope)) {
            $scope = explode(' ', $scope);
        }
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    /**
     * @param string|null $tokenType
     * @return $this
     */
    public function setTokenType(?string $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }

}