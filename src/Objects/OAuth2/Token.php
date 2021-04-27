<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


use Bytes\ResponseBundle\Token\AccessTokenTrait;
use Bytes\ResponseBundle\Token\Interfaces\AccessTokenInterface;
use Exception;
use Illuminate\Support\Arr;

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
    use AccessTokenTrait;

    /**
     * @param AccessTokenInterface|string $token
     * @return static
     * @throws Exception
     */
    public static function createFromAccessToken(AccessTokenInterface|string $token): static
    {
        $static = new static();
        if($token instanceof AccessTokenInterface) {
            $static->updateFromAccessToken($token);
        } else {
            $static->setAccessToken($token);
        }
        return $static;
    }

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
}