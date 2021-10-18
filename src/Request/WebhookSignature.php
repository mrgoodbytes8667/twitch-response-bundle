<?php


namespace Bytes\TwitchResponseBundle\Request;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.5.2', 'The "\Bytes\TwitchResponseBundle\Request\WebhookSignature" class is deprecated, there is no replacement.');

/**
 * Class WebhookSignature
 * @package Bytes\TwitchResponseBundle\Request
 *
 * @deprecated since 0.5.2. This functionality is no longer provided by Twitch and will be removed in the next version.
 */
class WebhookSignature extends AbstractSignature implements SignatureInterface
{
    const SIGNATURE_FIELD = 'X-Hub-Signature';

    /**
     * Return the locator name
     * @return string
     */
    public static function getDefaultIndexName(): string
    {
        return 'WEBHOOK';
    }
}