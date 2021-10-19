<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use Illuminate\Support\Arr;

/**
 * Class OAuthScopes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.1.3 As of 2020-10-26
 *
 * @method static self analyticsReadExtensions() View analytics data for your extensions.
 * @method static self analyticsReadGames() View analytics data for your games.
 * @method static self bitsRead() View Bits information for your channel.
 * @method static self channelEditCommercial() Run commercials on a channel.
 * @method static self channelManageBroadcast() Manage your channel's broadcast configuration, including updating channel configuration and managing stream markers and stream tags.
 * @method static self channelManageExtension() Manage your channel's extension configuration, including activating extensions.
 * @method static self channelReadHypeTrain() Gets the most recent hype train on a channel.
 * @method static self channelReadStreamKey() Read an authorized user's stream key.
 * @method static self channelReadSubscriptions() Get a list of all subscribers to your channel and check if a user is subscribed to your channel
 * @method static self clipsEdit() Manage a clip object.
 * @method static self userEdit() Manage a user object.
 * @method static self userEditFollows() Edit your follows.
 * @method static self userReadBroadcast() View your broadcasting configuration, including extension configurations.
 * @method static self userReadEmail() Read authorized user's email address.
 *
 * @link https://dev.twitch.tv/docs/authentication#scopes
 *
 */
class OAuthScopes extends Enum
{
    /**
     * Edit your channel's broadcast configuration, including extension configuration. (This scope implies user:read:broadcast capability.)
     * @return static
     * @deprecated 0.1.4 No longer available on Twitch
     */
    public static function userEditBroadcast()
    {
        return static::from('userEditBroadcast');
    }

    /**
     * Read authorized user's stream key.
     * @return static
     * @deprecated 0.1.4 No longer available on Twitch
     */
    public static function userReadStreamKey()
    {
        return static::from('userReadStreamKey');
    }

    /**
     * @param mixed ...$scopes
     * @return string
     *
     * @deprecated Since 0.3.0, use \Bytes\ResponseBundle\HttpClient\Token\AbstractTokenClient::buildOAuthString() instead from mrgoodbytes8667/response-bundle
     */
    public static function buildOAuthString(...$scopes)
    {
        trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.3.0', 'Using "%s" is deprecated, use "%s" in "mrgoodbytes8667/response-bundle" instead.', __METHOD__, '\Bytes\ResponseBundle\HttpClient\Token\AbstractTokenClient::buildOAuthString()');
        return implode(' ', Arr::flatten($scopes));
    }

    /**
     * @return array
     */
    public static function getUserScopes()
    {
        return [];
    }

    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'analyticsReadExtensions' => 'analytics:read:extensions',
            'analyticsReadGames' => 'analytics:read:games',
            'bitsRead' => 'bits:read',
            'channelEditCommercial' => 'channel:edit:commercial',
            'channelManageBroadcast' => 'channel:manage:broadcast',
            'channelManageExtension' => 'channel:manage:extension',
            'channelReadHypeTrain' => 'channel:read:hype_train',
            'channelReadStreamKey' => 'channel:read:stream_key',
            'channelReadSubscriptions' => 'channel:read:subscriptions',
            'clipsEdit' => 'clips:edit',
            'userEdit' => 'user:edit',
            'userEditBroadcast' => 'user:edit:broadcast', // Deprecated
            'userEditFollows' => 'user:edit:follows',
            'userReadBroadcast' => 'user:read:broadcast',
            'userReadEmail' => 'user:read:email',
            'userReadStreamKey' => 'user:read:stream_key', // Deprecated
        ];
    }
}