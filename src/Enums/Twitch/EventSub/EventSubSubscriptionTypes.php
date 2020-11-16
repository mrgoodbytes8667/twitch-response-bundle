<?php


namespace Bytes\TwitchResponseBundle\Enums\Twitch\EventSub;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class EventSubSubscriptionTypes
 * @package Bytes\TwitchResponseBundle\Enums\Twitch\EventSub
 *
 * @method static self channelUpdate() The channel.update subscription type sends notifications when a broadcaster updates the category, title, mature flag, or broadcast language for their channel.
 * @method static self channelFollow()
 * @method static self channelSubscribe()
 * @method static self channelCheer()
 * @method static self channelBan()
 * @method static self channelUnban()
 * @method static self channelChannelPointsCustomRewardAdd()
 * @method static self channelChannelPointsCustomRewardUpdate()
 * @method static self channelChannelPointsCustomRewardRemove()
 * @method static self channelChannelPointsCustomRewardRedemptionAdd()
 * @method static self channelChannelPointsCustomRewardRedemptionUpdate()
 * @method static self channelHypeTrainBegin()
 * @method static self channelHypeTrainProgress()
 * @method static self channelHypeTrainEnd()
 * @method static self streamOnline() The stream.online subscription type sends a notification when the specified broadcaster starts a stream.
 * @method static self streamOffline() The stream.offline subscription type sends a notification when the specified broadcaster stops a stream.
 * @method static self userAuthorizationRevoke() The user.authorization.revoke subscription type sends a notification when a user has revoked authorization for your client id. Use this webhook to meet government requirements for handling user data, such as GDPR, LGPD, or CCPA.
 * @method static self userUpdate() The user.update subscription type sends a notification when user updates their account.
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
            'channelBan' => 'channel.ban',
            'channelUnban' => 'channel.unban',
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