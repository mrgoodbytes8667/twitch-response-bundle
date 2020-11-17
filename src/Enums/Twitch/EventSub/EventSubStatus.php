<?php


namespace Bytes\TwitchResponseBundle\Enums\Twitch\EventSub;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class EventSubStatus
 * @package Bytes\TwitchResponseBundle\Enums\Twitch\EventSub
 *
 * @method static self enabled() designates that the subscription is in an operable state and is valid.
 * @method static self webhookCallbackVerificationPending() webhook is pending verification of the callback specified in the subscription creation request.
 * @method static self webhookCallbackVerificationFailed() webhook failed verification of the callback specified in the subscription creation request.
 * @method static self notificationFailuresExceeded() notification delivery failure rate was too high.
 * @method static self authorizationRevoked() authorization for user(s) in the condition was revoked.
 * @method static self userRemoved() a user in the condition of the subscription was removed.
 */
class EventSubStatus extends Enum
{
    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'webhookCallbackVerificationPending' => 'webhook_callback_verification_pending',
            'webhookCallbackVerificationFailed' => 'webhook_callback_verification_failed',
            'notificationFailuresExceeded' => 'notification_failures_exceeded',
            'authorizationRevoked' => 'authorization_revoked',
            'userRemoved' => 'user_removed',
        ];
    }
}