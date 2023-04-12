<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use Bytes\ResponseBundle\Routing\OAuthPromptInterface;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class OAuthForceVerify
 * Specifies whether the user should be re-prompted for authorization.
 * @package Bytes\TwitchResponseBundle\Enums
 */
enum OAuthForceVerify: string implements StringBackedEnumInterface, OAuthPromptInterface
{
    use StringBackedEnumTrait;

    /**
     * The user always is prompted to confirm authorization. This is useful to allow your users to switch Twitch accounts, since there is no way to log users out of the API
     */
    case TRUE = 'true';

    /**
     * [default] A given user sees the authorization page for a given set of scopes only the first time through the sequence
     */
    case FALSE = 'false';

    /**
     * Returns the prompt value
     * @return bool
     */
    public function prompt(): bool
    {
        return $this->value !== 'false';
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::TRUE')]
    public static function true(): OAuthForceVerify
    {
        return OAuthForceVerify::TRUE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::FALSE')]
    public static function false(): OAuthForceVerify
    {
        return OAuthForceVerify::FALSE;
    }
}