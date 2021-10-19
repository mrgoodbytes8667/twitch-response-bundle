<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class EventSubSubscriptionTypes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.5.3 As of 2021-10-19
 *
 * @method static self channelUpdate() A broadcaster updates their channel properties e.g., category, title, mature flag, broadcast, or language.
 * @method static self channelFollow() A specified channel receives a follow.
 * @method static self channelSubscribe() A notification when a specified channel receives a subscriber. This does not include resubscribes.
 * @method static self channelSubscriptionEnd() A notification when a subscription to the specified channel ends.
 * @method static self channelSubscriptionGift() A notification when a viewer gives a gift subscription to one or more users in the specified channel.
 * @method static self channelSubscriptionMessage() A notification when a user sends a resubscription chat message in a specific channel.
 * @method static self channelCheer() A user cheers on the specified channel.
 * @method static self channelRaid() A broadcaster raids another broadcaster’s channel.
 * @method static self channelBan() A viewer is banned from the specified channel.
 * @method static self channelUnban() A viewer is unbanned from the specified channel.
 * @method static self channelModeratorAdd() Moderator privileges were added to a user on a specified channel.
 * @method static self channelModeratorRemove() Moderator privileges were removed from a user on a specified channel.
 * @method static self channelPointsCustomRewardAdd() A custom channel points reward has been created for the specified channel.
 * @method static self channelPointsCustomRewardUpdate() A custom channel points reward has been updated for the specified channel.
 * @method static self channelPointsCustomRewardRemove() A custom channel points reward has been removed from the specified channel.
 * @method static self channelPointsCustomRewardRedemptionAdd() A viewer has redeemed a custom channel points reward on the specified channel.
 * @method static self channelPointsCustomRewardRedemptionUpdate() A redemption of a channel points custom reward has been updated for the specified channel.
 * @method static self channelPollBegin() A poll started on a specified channel.
 * @method static self channelPollProgress() Users respond to a poll on a specified channel.
 * @method static self channelPollEnd() A poll ended on a specified channel.
 * @method static self channelPredictionBegin() A Prediction started on a specified channel.
 * @method static self channelPredictionProgress() Users participated in a Prediction on a specified channel.
 * @method static self channelPredictionLock() A Prediction was locked on a specified channel.
 * @method static self channelPredictionEnd() A Prediction ended on a specified channel.
 * @method static self dropEntitlementGrant() An entitlement for a Drop is granted to a user.
 * @method static self extensionBitsTransactionCreate() A Bits transaction occurred for a specified Twitch Extension.
 * @method static self goalBegin() Get notified when a broadcaster begins a goal.
 * @method static self goalProgress() Get notified when progress (either positive or negative) is made towards a broadcaster’s goal.
 * @method static self goalEnd() Get notified when a broadcaster ends a goal.
 * @method static self hypeTrainBegin() A Hype Train begins on the specified channel.
 * @method static self hypeTrainProgress() A Hype Train makes progress on the specified channel.
 * @method static self hypeTrainEnd() A Hype Train ends on the specified channel.
 * @method static self streamOnline() The specified broadcaster starts a stream.
 * @method static self streamOffline() The specified broadcaster stops a stream.
 * @method static self userAuthorizationGrant() A user’s authorization has been granted to your client id.
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
            'channelSubscriptionEnd' => 'channel.subscription.end',
            'channelSubscriptionGift' => 'channel.subscription.gift',
            'channelSubscriptionMessage' => 'channel.subscription.message',
            'channelCheer' => 'channel.cheer',
            'channelRaid' => 'channel.raid',
            'channelBan' => 'channel.ban',
            'channelUnban' => 'channel.unban',
            'channelModeratorAdd' => 'channel.moderator.add',
            'channelModeratorRemove' => 'channel.moderator.remove',
            'channelPointsCustomRewardAdd' => 'channel.channel_points_custom_reward.add',
            'channelPointsCustomRewardUpdate' => 'channel.channel_points_custom_reward.update',
            'channelPointsCustomRewardRemove' => 'channel.channel_points_custom_reward.remove',
            'channelPointsCustomRewardRedemptionAdd' => 'channel.channel_points_custom_reward_redemption.add',
            'channelPointsCustomRewardRedemptionUpdate' => 'channel.channel_points_custom_reward_redemption.update',
            'channelPollBegin' => 'channel.poll.begin',
            'channelPollProgress' => 'channel.poll.progress',
            'channelPollEnd' => 'channel.poll.end',
            'channelPredictionBegin' => 'channel.prediction.begin',
            'channelPredictionProgress' => 'channel.prediction.progress',
            'channelPredictionLock' => 'channel.prediction.lock',
            'channelPredictionEnd' => 'channel.prediction.end',
            'dropEntitlementGrant' => 'drop.entitlement.grant',
            'extensionBitsTransactionCreate' => 'extension.bits_transaction.create',
            'goalBegin' => 'channel.goal.begin',
            'goalProgress' => 'channel.goal.progress',
            'goalEnd' => 'channel.goal.end',
            'hypeTrainBegin' => 'channel.hype_train.begin',
            'hypeTrainProgress' => 'channel.hype_train.progress',
            'hypeTrainEnd' => 'channel.hype_train.end',
            'streamOnline' => 'stream.online',
            'streamOffline' => 'stream.offline',
            'userAuthorizationGrant' => 'user.authorization.grant',
            'userAuthorizationRevoke' => 'user.authorization.revoke',
            'userUpdate' => 'user.update',
        ];
    }

    /**
     * A custom channel points reward has been created for the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use channelPointsCustomRewardAdd() instead', '%class%::channelPointsCustomRewardAdd()')]
    public static function channelChannelPointsCustomRewardAdd()
    {
        return static::from('channelPointsCustomRewardAdd');
    }

    /**
     * A custom channel points reward has been updated for the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use channelPointsCustomRewardUpdate() instead', '%class%::channelPointsCustomRewardUpdate()')]
    public static function channelChannelPointsCustomRewardUpdate()
    {
        return static::from('channelPointsCustomRewardUpdate');
    }

    /**
     * A custom channel points reward has been removed from the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use channelPointsCustomRewardRemove() instead', '%class%::channelPointsCustomRewardRemove()')]
    public static function channelChannelPointsCustomRewardRemove()
    {
        return static::from('channelPointsCustomRewardRemove');
    }

    /**
     * A viewer has redeemed a custom channel points reward on the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use channelPointsCustomRewardRedemptionAdd() instead', '%class%::channelPointsCustomRewardRedemptionAdd()')]
    public static function channelChannelPointsCustomRewardRedemptionAdd()
    {
        return static::from('channelPointsCustomRewardRedemptionAdd');
    }

    /**
     * A redemption of a channel points custom reward has been updated for the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use channelPointsCustomRewardRedemptionUpdate() instead', '%class%::channelPointsCustomRewardRedemptionUpdate()')]
    public static function channelChannelPointsCustomRewardRedemptionUpdate()
    {
        return static::from('channelPointsCustomRewardRedemptionUpdate');
    }

    /**
     * A hype train begins on the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use hypeTrainBegin() instead', '%class%::hypeTrainBegin()')]
    public static function channelHypeTrainBegin()
    {
        return static::from('hypeTrainBegin');
    }

    /**
     * A hype train makes progress on the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use hypeTrainProgress() instead', '%class%::hypeTrainProgress()')]
    public static function channelHypeTrainProgress()
    {
        return static::from('hypeTrainProgress');
    }

    /**
     * A hype train ends on the specified channel.
     * @return static
     */
    #[Deprecated('since 0.5.3, use hypeTrainEnd() instead', '%class%::hypeTrainEnd()')]
    public static function channelHypeTrainEnd()
    {
        return static::from('hypeTrainEnd');
    }
}