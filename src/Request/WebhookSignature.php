<?php


namespace Bytes\TwitchResponseBundle\Request;

/**
 * Class WebhookSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
class WebhookSignature extends AbstractSignature implements SignatureInterface
{
    const SIGNATURE_FIELD = 'X-Hub-Signature';
}