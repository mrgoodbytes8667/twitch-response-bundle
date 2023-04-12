<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class OAuthScopes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.5.3 As of 2021-10-19
 *
 * @link https://dev.twitch.tv/docs/authentication#scopes
 *
 */
enum OAuthScopes: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case ANALYTICS_READ_EXTENSIONS = 'analytics:read:extensions';
    case ANALYTICS_READ_GAMES = 'analytics:read:games';
    case BITS_READ = 'bits:read';
    case CHANNEL_EDIT_COMMERCIAL = 'channel:edit:commercial';
    case CHANNEL_MANAGE_BROADCAST = 'channel:manage:broadcast';
    case CHANNEL_MANAGE_EXTENSIONS = 'channel:manage:extensions';
    case CHANNEL_MANAGE_POLLS = 'channel:manage:polls';
    case CHANNEL_MANAGE_PREDICTIONS = 'channel:manage:predictions';
    case CHANNEL_MANAGE_REDEMPTIONS = 'channel:manage:redemptions';
    case CHANNEL_MANAGE_SCHEDULE = 'channel:manage:schedule';
    case CHANNEL_MANAGE_VIDEOS = 'channel:manage:videos';
    case CHANNEL_READ_EDITORS = 'channel:read:editors';
    case CHANNEL_READ_GOALS = 'channel:read:goals';
    case CHANNEL_READ_HYPE_TRAIN = 'channel:read:hype_train';
    case CHANNEL_READ_POLLS = 'channel:read:polls';
    case CHANNEL_READ_PREDICTIONS = 'channel:read:predictions';
    case CHANNEL_READ_REDEMPTIONS = 'channel:read:redemptions';
    case CHANNEL_READ_STREAM_KEY = 'channel:read:stream_key';
    case CHANNEL_READ_SUBSCRIPTIONS = 'channel:read:subscriptions';
    case CLIPS_EDIT = 'clips:edit';
    case MODERATION_READ = 'moderation:read';
    case MODERATOR_MANAGE_AUTOMOD = 'moderator:manage:automod';
    case USER_EDIT = 'user:edit';
    case USER_MANAGE_BLOCKED_USERS = 'user:manage:blocked_users';
    case USER_READ_BLOCKED_USERS = 'user:read:blocked_users';
    case USER_READ_BROADCAST = 'user:read:broadcast';
    case USER_READ_EMAIL = 'user:read:email';
    case USER_READ_FOLLOWS = 'user:read:follows';
    case USER_READ_SUBSCRIPTIONS = 'user:read:subscriptions';

    /**
     * @return array
     */
    public static function getUserScopes()
    {
        return [];
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ANALYTICS_READ_EXTENSIONS')]
    public static function analyticsReadExtensions(): OAuthScopes
    {
        return OAuthScopes::ANALYTICS_READ_EXTENSIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ANALYTICS_READ_GAMES')]
    public static function analyticsReadGames(): OAuthScopes
    {
        return OAuthScopes::ANALYTICS_READ_GAMES;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::BITS_READ')]
    public static function bitsRead(): OAuthScopes
    {
        return OAuthScopes::BITS_READ;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_EDIT_COMMERCIAL')]
    public static function channelEditCommercial(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_EDIT_COMMERCIAL;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_BROADCAST')]
    public static function channelManageBroadcast(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_BROADCAST;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_EXTENSIONS')]
    public static function channelManageExtensions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_EXTENSIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_POLLS')]
    public static function channelManagePolls(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_POLLS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_PREDICTIONS')]
    public static function channelManagePredictions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_PREDICTIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_REDEMPTIONS')]
    public static function channelManageRedemptions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_REDEMPTIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_SCHEDULE')]
    public static function channelManageSchedule(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_SCHEDULE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MANAGE_VIDEOS')]
    public static function channelManageVideos(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_MANAGE_VIDEOS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_EDITORS')]
    public static function channelReadEditors(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_EDITORS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_GOALS')]
    public static function channelReadGoals(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_GOALS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_HYPE_TRAIN')]
    public static function channelReadHypeTrain(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_HYPE_TRAIN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_POLLS')]
    public static function channelReadPolls(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_POLLS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_PREDICTIONS')]
    public static function channelReadPredictions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_PREDICTIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_REDEMPTIONS')]
    public static function channelReadRedemptions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_REDEMPTIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_STREAM_KEY')]
    public static function channelReadStreamKey(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_STREAM_KEY;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_READ_SUBSCRIPTIONS')]
    public static function channelReadSubscriptions(): OAuthScopes
    {
        return OAuthScopes::CHANNEL_READ_SUBSCRIPTIONS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CLIPS_EDIT')]
    public static function clipsEdit(): OAuthScopes
    {
        return OAuthScopes::CLIPS_EDIT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MODERATION_READ')]
    public static function moderationRead(): OAuthScopes
    {
        return OAuthScopes::MODERATION_READ;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MODERATOR_MANAGE_AUTOMOD')]
    public static function moderatorManageAutomod(): OAuthScopes
    {
        return OAuthScopes::MODERATOR_MANAGE_AUTOMOD;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_EDIT')]
    public static function userEdit(): OAuthScopes
    {
        return OAuthScopes::USER_EDIT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_MANAGE_BLOCKED_USERS')]
    public static function userManageBlockedUsers(): OAuthScopes
    {
        return OAuthScopes::USER_MANAGE_BLOCKED_USERS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_READ_BLOCKED_USERS')]
    public static function userReadBlockedUsers(): OAuthScopes
    {
        return OAuthScopes::USER_READ_BLOCKED_USERS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_READ_BROADCAST')]
    public static function userReadBroadcast(): OAuthScopes
    {
        return OAuthScopes::USER_READ_BROADCAST;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_READ_EMAIL')]
    public static function userReadEmail(): OAuthScopes
    {
        return OAuthScopes::USER_READ_EMAIL;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_READ_FOLLOWS')]
    public static function userReadFollows(): OAuthScopes
    {
        return OAuthScopes::USER_READ_FOLLOWS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_READ_SUBSCRIPTIONS')]
    public static function userReadSubscriptions(): OAuthScopes
    {
        return OAuthScopes::USER_READ_SUBSCRIPTIONS;
    }
}
