<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


use Bytes\ResponseBundle\Token\Interfaces\AccessTokenInterface;

/**
 * Class Token
 * @package Bytes\TwitchResponseBundle\Objects\OAuth2
 *
 * @link https://dev.twitch.tv/docs/authentication Twitch Authentication
 * @link https://dev.twitch.tv/docs/authentication#refreshing-access-tokens Token response example (included below)
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
     * User access token
     * @var string|null
     */
    private $accessToken;

    /**
     * Refresh token
     * @var string|null
     */
    private $refreshToken;

    /**
     * Time (in seconds) until the access token expires
     * @var int|null
     */
    private $expiresIn;

    /**
     * Array of scopes
     * @var string[]|null
     */
    private $scope;

    /**
     * Always 'bearer' for Twitch
     * @var string|null = 'bearer'
     */
    private $tokenType;

    /**
     * Get the user access token
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * Set the user access token
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
     * Get the time (in seconds) until the access token expires
     * @return int|null
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * Set the time (in seconds) until the access token expires
     * @param int|null $expiresIn
     * @return $this
     */
    public function setExpiresIn(?int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * Get the array of scopes
     * @return string[]|null
     */
    public function getScope(): ?array
    {
        return $this->scope;
    }

    /**
     * Set the scope(s).
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
     * Get the OAuth token type. Always 'bearer' for Twitch.
     * @return string|null = 'bearer'
     */
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    /**
     * Set the OAuth token type. Always 'bearer' for Twitch.
     * @param string|null $tokenType = 'bearer'
     * @return $this
     */
    public function setTokenType(?string $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @param string $token
     * @return static
     */
    public static function createFromAccessToken(string $token): static
    {
        $static = new static();
        $static->setAccessToken($token);
        return $static;
    }

}