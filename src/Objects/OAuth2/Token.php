<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


use Bytes\ResponseBundle\Enums\TokenSource;
use Bytes\ResponseBundle\Token\AccessTokenCreateUpdateFromTrait;
use Bytes\ResponseBundle\Token\Interfaces\AccessTokenInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Illuminate\Support\Arr;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
    use AccessTokenCreateUpdateFromTrait;

    /**
     * Update the current access token with details from another access token (ie: a refresh token)
     * @param AccessTokenInterface $token
     * @return $this
     * @throws Exception
     */
    public function updateFromAccessToken(AccessTokenInterface $token): static
    {
        $this->setAccessToken($token->getAccessToken());
        $this->setRefreshToken($token->getRefreshToken());
        $this->setExpiresIn($token->getExpiresIn());
        $this->setScope(implode(' ', Arr::wrap($token->getScope()) ?? []));
        $this->setTokenType($token->getTokenType());

        return $this;
    }

    /**
     * @param mixed ...$args = accessToken, refreshToken, expiresIn, scope, tokenType, tokenSource, identifier, user
     * @return static
     * @throws Exception
     */
    public static function createFromParts(...$args): static
    {
        $static = new static();
        return $static->setFromParts(...$args);
    }

    /**
     * @param string|null $accessToken
     * @param string|null $refreshToken
     * @param \DateInterval|int|null $expiresIn
     * @param string|array|null $scope
     * @param string|null $tokenType
     * @param TokenSource|null $tokenSource
     * @param string|null $identifier
     * @param UserInterface|null $user
     * @return $this
     * @throws Exception
     */
    private function setFromParts(?string $accessToken = null, ?string $refreshToken = null, \DateInterval|int|null $expiresIn = null, string|array|null $scope = null, ?string $tokenType = null, ?TokenSource $tokenSource = null, ?string $identifier = null, ?UserInterface $user = null)
    {
        $this->setAccessToken($accessToken);
        $this->setRefreshToken($refreshToken);
        $this->setExpiresIn($expiresIn);
        $this->setScope($scope ?: []);
        $this->setTokenType($tokenType);
        $this->setTokenSource($tokenSource);
        $this->setIdentifier($identifier);
        $this->setUser($user);

        return $this;
    }
}