<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class EventSubSubscriptionTypes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self channelUpdate() A broadcaster updates their channel properties e.g., category, title, mature flag, broadcast, or language.
 * @method static self channelFollow() A specified channel receives a follow.
 * @method static self channelSubscribe() A notification when a specified channel receives a subscriber. This does not include resubscribes.
 * @method static self channelCheer() A user cheers on the specified channel.
 * @method static self channelRaid() A broadcaster raids another broadcaster’s channel.
 * @method static self channelBan() A viewer is banned from the specified channel.
 * @method static self channelUnban() A viewer is unbanned from the specified channel.
 * @method static self channelModeratorAdd() Moderator privileges were added to a user on a specified channel.
 * @method static self channelModeratorRemove() Moderator privileges were removed from a user on a specified channel.
 * @method static self channelChannelPointsCustomRewardAdd() A custom channel points reward has been created for the specified channel.
 * @method static self channelChannelPointsCustomRewardUpdate() A custom channel points reward has been updated for the specified channel.
 * @method static self channelChannelPointsCustomRewardRemove() A custom channel points reward has been removed from the specified channel.
 * @method static self channelChannelPointsCustomRewardRedemptionAdd() A viewer has redeemed a custom channel points reward on the specified channel.
 * @method static self channelChannelPointsCustomRewardRedemptionUpdate() A redemption of a channel points custom reward has been updated for the specified channel.
 * @method static self channelHypeTrainBegin() A hype train begins on the specified channel.
 * @method static self channelHypeTrainProgress() A hype train makes progress on the specified channel.
 * @method static self channelHypeTrainEnd() A hype train ends on the specified channel.
 * @method static self streamOnline() The specified broadcaster starts a stream.
 * @method static self streamOffline() The specified broadcaster stops a stream.
 * @method static self userAuthorizationRevoke() A user’s authorization has been revoked for your client id.
 * @method static self userUpdate() A user has updated their account.
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-subscription-types
 */
class EventSubSubscriptionTypes extends Enum
{
    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'channelUpdate' => 'channel.update',
            'channelFollow' => 'channel.follow',
            'channelSubscribe' => 'channel.subscribe',
            'channelCheer' => 'channel.cheer',
            'channelRaid' => 'channel.raid',
            'channelBan' => 'channel.ban',
            'channelUnban' => 'channel.unban',
            'channelModeratorAdd' => 'channel.moderator.add',
            'channelModeratorRemove' => 'channel.moderator.remove',
            'channelChannelPointsCustomRewardAdd' => 'channel.channel_points_custom_reward.add',
            'channelChannelPointsCustomRewardUpdate' => 'channel.channel_points_custom_reward.update',
            'channelChannelPointsCustomRewardRemove' => 'channel.channel_points_custom_reward.remove',
            'channelChannelPointsCustomRewardRedemptionAdd' => 'channel.channel_points_custom_reward_redemption.add',
            'channelChannelPointsCustomRewardRedemptionUpdate' => 'channel.channel_points_custom_reward_redemption.update',
            'channelHypeTrainBegin' => 'channel.hype_train.begin',
            'channelHypeTrainProgress' => 'channel.hype_train.progress',
            'channelHypeTrainEnd' => 'channel.hype_train.end',
            'streamOnline' => 'stream.online',
            'streamOffline' => 'stream.offline',
            'userAuthorizationRevoke' => 'user.authorization.revoke',
            'userUpdate' => 'user.update',
        ];
    }
}