<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class EventSubSubscriptionTypes
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @since 0.5.3 As of 2021-10-19
 *
 * @link https://dev.twitch.tv/docs/eventsub/eventsub-subscription-types
 */
enum EventSubSubscriptionTypes: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case CHANNEL_UPDATE = 'channel.update';
    case CHANNEL_FOLLOW = 'channel.follow';
    case CHANNEL_SUBSCRIBE = 'channel.subscribe';
    case CHANNEL_SUBSCRIPTION_END = 'channel.subscription.end';
    case CHANNEL_SUBSCRIPTION_GIFT = 'channel.subscription.gift';
    case CHANNEL_SUBSCRIPTION_MESSAGE = 'channel.subscription.message';
    case CHANNEL_CHEER = 'channel.cheer';
    case CHANNEL_RAID = 'channel.raid';
    case CHANNEL_BAN = 'channel.ban';
    case CHANNEL_UNBAN = 'channel.unban';
    case CHANNEL_MODERATOR_ADD = 'channel.moderator.add';
    case CHANNEL_MODERATOR_REMOVE = 'channel.moderator.remove';
    case CHANNEL_POINTS_CUSTOM_REWARD_ADD = 'channel.channel_points_custom_reward.add';
    case CHANNEL_POINTS_CUSTOM_REWARD_UPDATE = 'channel.channel_points_custom_reward.update';
    case CHANNEL_POINTS_CUSTOM_REWARD_REMOVE = 'channel.channel_points_custom_reward.remove';
    case CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_ADD = 'channel.channel_points_custom_reward_redemption.add';
    case CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_UPDATE = 'channel.channel_points_custom_reward_redemption.update';
    case CHANNEL_POLL_BEGIN = 'channel.poll.begin';
    case CHANNEL_POLL_PROGRESS = 'channel.poll.progress';
    case CHANNEL_POLL_END = 'channel.poll.end';
    case CHANNEL_PREDICTION_BEGIN = 'channel.prediction.begin';
    case CHANNEL_PREDICTION_PROGRESS = 'channel.prediction.progress';
    case CHANNEL_PREDICTION_LOCK = 'channel.prediction.lock';
    case CHANNEL_PREDICTION_END = 'channel.prediction.end';
    case DROP_ENTITLEMENT_GRANT = 'drop.entitlement.grant';
    case EXTENSION_BITS_TRANSACTION_CREATE = 'extension.bits_transaction.create';
    case GOAL_BEGIN = 'channel.goal.begin';
    case GOAL_PROGRESS = 'channel.goal.progress';
    case GOAL_END = 'channel.goal.end';
    case HYPE_TRAIN_BEGIN = 'channel.hype_train.begin';
    case HYPE_TRAIN_PROGRESS = 'channel.hype_train.progress';
    case HYPE_TRAIN_END = 'channel.hype_train.end';
    case STREAM_ONLINE = 'stream.online';
    case STREAM_OFFLINE = 'stream.offline';
    case USER_AUTHORIZATION_GRANT = 'user.authorization.grant';
    case USER_AUTHORIZATION_REVOKE = 'user.authorization.revoke';
    case USER_UPDATE = 'user.update';

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_UPDATE')]
    public static function channelUpdate(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_UPDATE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_FOLLOW')]
    public static function channelFollow(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_FOLLOW;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_SUBSCRIBE')]
    public static function channelSubscribe(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_SUBSCRIBE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_SUBSCRIPTION_END')]
    public static function channelSubscriptionEnd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_SUBSCRIPTION_END;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_SUBSCRIPTION_GIFT')]
    public static function channelSubscriptionGift(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_SUBSCRIPTION_GIFT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_SUBSCRIPTION_MESSAGE')]
    public static function channelSubscriptionMessage(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_SUBSCRIPTION_MESSAGE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_CHEER')]
    public static function channelCheer(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_CHEER;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_RAID')]
    public static function channelRaid(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_RAID;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_BAN')]
    public static function channelBan(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_BAN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_UNBAN')]
    public static function channelUnban(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_UNBAN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MODERATOR_ADD')]
    public static function channelModeratorAdd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_MODERATOR_ADD;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_MODERATOR_REMOVE')]
    public static function channelModeratorRemove(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_MODERATOR_REMOVE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POINTS_CUSTOM_REWARD_ADD')]
    public static function channelPointsCustomRewardAdd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POINTS_CUSTOM_REWARD_ADD;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POINTS_CUSTOM_REWARD_UPDATE')]
    public static function channelPointsCustomRewardUpdate(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POINTS_CUSTOM_REWARD_UPDATE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POINTS_CUSTOM_REWARD_REMOVE')]
    public static function channelPointsCustomRewardRemove(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POINTS_CUSTOM_REWARD_REMOVE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_ADD')]
    public static function channelPointsCustomRewardRedemptionAdd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_ADD;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_UPDATE')]
    public static function channelPointsCustomRewardRedemptionUpdate(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POINTS_CUSTOM_REWARD_REDEMPTION_UPDATE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POLL_BEGIN')]
    public static function channelPollBegin(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POLL_BEGIN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POLL_PROGRESS')]
    public static function channelPollProgress(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POLL_PROGRESS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_POLL_END')]
    public static function channelPollEnd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_POLL_END;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_PREDICTION_BEGIN')]
    public static function channelPredictionBegin(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_PREDICTION_BEGIN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_PREDICTION_PROGRESS')]
    public static function channelPredictionProgress(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_PREDICTION_PROGRESS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_PREDICTION_LOCK')]
    public static function channelPredictionLock(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_PREDICTION_LOCK;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::CHANNEL_PREDICTION_END')]
    public static function channelPredictionEnd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::CHANNEL_PREDICTION_END;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::DROP_ENTITLEMENT_GRANT')]
    public static function dropEntitlementGrant(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::DROP_ENTITLEMENT_GRANT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::EXTENSION_BITS_TRANSACTION_CREATE')]
    public static function extensionBitsTransactionCreate(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::EXTENSION_BITS_TRANSACTION_CREATE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::GOAL_BEGIN')]
    public static function goalBegin(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::GOAL_BEGIN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::GOAL_PROGRESS')]
    public static function goalProgress(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::GOAL_PROGRESS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::GOAL_END')]
    public static function goalEnd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::GOAL_END;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::HYPE_TRAIN_BEGIN')]
    public static function hypeTrainBegin(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::HYPE_TRAIN_BEGIN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::HYPE_TRAIN_PROGRESS')]
    public static function hypeTrainProgress(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::HYPE_TRAIN_PROGRESS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::HYPE_TRAIN_END')]
    public static function hypeTrainEnd(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::HYPE_TRAIN_END;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::STREAM_ONLINE')]
    public static function streamOnline(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::STREAM_ONLINE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::STREAM_OFFLINE')]
    public static function streamOffline(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::STREAM_OFFLINE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_AUTHORIZATION_GRANT')]
    public static function userAuthorizationGrant(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::USER_AUTHORIZATION_GRANT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_AUTHORIZATION_REVOKE')]
    public static function userAuthorizationRevoke(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::USER_AUTHORIZATION_REVOKE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::USER_UPDATE')]
    public static function userUpdate(): EventSubSubscriptionTypes
    {
        return EventSubSubscriptionTypes::USER_UPDATE;
    }
}
