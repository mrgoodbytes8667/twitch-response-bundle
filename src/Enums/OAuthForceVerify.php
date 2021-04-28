<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use Bytes\ResponseBundle\Services\OAuthPromptInterface;

/**
 * Class OAuthForceVerify
 * Specifies whether the user should be re-prompted for authorization.
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self true() The user always is prompted to confirm authorization. This is useful to allow your users to switch Twitch accounts, since there is no way to log users out of the API
 * @method static self false() [default] A given user sees the authorization page for a given set of scopes only the first time through the sequence
 */
class OAuthForceVerify extends Enum implements OAuthPromptInterface
{
    /**
     * @return bool
     */
    public function prompt()
    {
        return $this->value !== 'false';
    }
}