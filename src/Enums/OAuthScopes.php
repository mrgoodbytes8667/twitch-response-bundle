<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use Illuminate\Support\Arr;

/**
 * Class OAuthScopes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.5.3 As of 2021-10-19
 *
 * @method static self analyticsReadExtensions() View analytics data for the Twitch Extensions owned by the authenticated account.
 * @method static self analyticsReadGames() View analytics data for the games owned by the authenticated account.
 * @method static self bitsRead() View Bits information for a channel.
 * @method static self channelEditCommercial() Run commercials on a channel.
 * @method static self channelManageBroadcast() Manage a channel’s broadcast configuration, including updating channel configuration and managing stream markers and stream tags.
 * @method static self channelManageExtensions() Manage a channel’s Extension configuration, including activating Extensions.
 * @method static self channelManagePolls() Manage a channel’s polls.
 * @method static self channelManagePredictions() Manage of channel’s Channel Points Predictions
 * @method static self channelManageRedemptions() Manage Channel Points custom rewards and their redemptions on a channel.
 * @method static self channelManageSchedule() Manage a channel’s stream schedule.
 * @method static self channelManageVideos() Manage a channel’s videos, including deleting videos.
 * @method static self channelReadEditors() View a list of users with the editor role for a channel.
 * @method static self channelReadGoals() View Creator Goals for a channel.
 * @method static self channelReadHypeTrain() View Hype Train information for a channel.
 * @method static self channelReadPolls() View a channel’s polls.
 * @method static self channelReadPredictions() View a channel’s Channel Points Predictions.
 * @method static self channelReadRedemptions() View Channel Points custom rewards and their redemptions on a channel.
 * @method static self channelReadStreamKey() View an authorized user’s stream key.
 * @method static self channelReadSubscriptions() View a list of all subscribers to a channel and check if a user is subscribed to a channel.
 * @method static self clipsEdit() Manage Clips for a channel.
 * @method static self moderationRead() View a channel’s moderation data including Moderators, Bans, Timeouts, and Automod settings.
 * @method static self moderatorManageAutomod() Manage messages held for review by AutoMod in channels where you are a moderator.
 * @method static self userEdit() Manage a user object.
 * @method static self userManageBlockedUsers() Manage the block list of a user.
 * @method static self userReadBlockedUsers() View the block list of a user.
 * @method static self userReadBroadcast() View a user’s broadcasting configuration, including Extension configurations.
 * @method static self userReadEmail() View a user’s email address.
 * @method static self userReadFollows() View the list of channels a user follows.
 * @method static self userReadSubscriptions() View if an authorized user is subscribed to specific channels.
 *
 * @link https://dev.twitch.tv/docs/authentication#scopes
 *
 */
class OAuthScopes extends Enum
{
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
            'channelManageExtensions' => 'channel:manage:extensions',
            'channelManagePolls' => 'channel:manage:polls',
            'channelManagePredictions' => 'channel:manage:predictions',
            'channelManageRedemptions' => 'channel:manage:redemptions',
            'channelManageSchedule' => 'channel:manage:schedule',
            'channelManageVideos' => 'channel:manage:videos',
            'channelReadEditors' => 'channel:read:editors',
            'channelReadGoals' => 'channel:read:goals',
            'channelReadHypeTrain' => 'channel:read:hype_train',
            'channelReadPolls' => 'channel:read:polls',
            'channelReadPredictions' => 'channel:read:predictions',
            'channelReadRedemptions' => 'channel:read:redemptions',
            'channelReadStreamKey' => 'channel:read:stream_key',
            'channelReadSubscriptions' => 'channel:read:subscriptions',
            'clipsEdit' => 'clips:edit',
            'moderationRead' => 'moderation:read',
            'moderatorManageAutomod' => 'moderator:manage:automod',
            'userEdit' => 'user:edit',
            'userManageBlockedUsers' => 'user:manage:blocked_users',
            'userReadBlockedUsers' => 'user:read:blocked_users',
            'userReadBroadcast' => 'user:read:broadcast',
            'userReadEmail' => 'user:read:email',
            'userReadFollows' => 'user:read:follows',
            'userReadSubscriptions' => 'user:read:subscriptions',
        ];
    }
}