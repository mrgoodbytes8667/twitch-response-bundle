<?php


namespace Bytes\TwitchResponseBundle\Request;

/**
 * Class WebhookSignature
 * @package Bytes\TwitchResponseBundle\Request
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