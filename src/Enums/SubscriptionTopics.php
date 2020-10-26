<?php


namespace Bytes\TwitchResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class SubscriptionTopics
 * All values are the Subscription Hub Topic URL without https://api.twitch.tv/helix/
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self streamChanged()
 * @method static self userChanged()
 * @method static self follows()
 * @method static self extensionsTransactions() extensions/transactions
 * @method static self moderatorChanged() moderation/moderators/events
 * @method static self channelBan() moderation/banned/events
 * @method static self subscriptionChanged() subscriptions/events
 * @method static self hypeTrain() hypetrain/events
 *
 * @link https://github.com/spatie/enum
 * @link https://dev.twitch.tv/docs/api/webhooks-reference
 *
 * @since 0.1.3 As of 2020-10-26
 */
class SubscriptionTopics extends Enum
{
    /**
     * @since 0.1.3
     */
    const STREAMCHANGED = 'streams';

    /**
     * @since 0.1.3
     */
    const USERCHANGED = 'users';

    /**
     * @since 0.1.3
     */
    const FOLLOWS = 'users/follows';

    /**
     * @since 0.1.3
     */
    const EXTENSIONSTRANSACTIONS = 'extensions/transactions';

    /**
     * @since 0.1.3
     */
    const MODERATIONMODERATORSEVENTS = 'moderation/moderators/events';

    /**
     * @since 0.1.3
     */
    const MODERATIONBANNEDEVENTS = 'moderation/banned/events';

    /**
     * @since 0.1.3
     */
    const SUBSCRIPTIONSEVENTS = 'subscriptions/events';

    /**
     * @since 0.1.3
     */
    const HYPETRAINEVENTS = 'hypetrain/events';

    /**
     * @return string[]
     * @since 0.1.3
     */
    protected static function values(): array
    {
        return [
            'streamChanged' => static::STREAMCHANGED,
            'userChanged' => static::USERCHANGED,
            'follows' => static::FOLLOWS,
            'extensionsTransactions' => static::EXTENSIONSTRANSACTIONS,
            'moderatorChanged' => static::MODERATIONMODERATORSEVENTS,
            'channelBan' => static::MODERATIONBANNEDEVENTS,
            'subscriptionChanged' => static::SUBSCRIPTIONSEVENTS,
            'hypeTrain' => static::HYPETRAINEVENTS,
        ];
    }
}