<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.3.0', 'Using "%s" is deprecated, use "%s" or "%s" instead.', __CLASS__, EventSubSignature::class, WebhookSignature::class);

/**
 * Class Signature
 * @package Bytes\TwitchResponseBundle\Services
 *
 * @deprecated Use EventSubSignature or WebhookSignature instead
 */
class Signature
{
    private string $signatureField;
    private string $twitchHubSecret;

    /**
     * Signature constructor.
     * @param string $signatureField
     * @param string $twitchHubSecret
     */
    public function __construct(string $signatureField, string $twitchHubSecret)
    {
        $this->signatureField = $signatureField;
        $this->twitchHubSecret = $twitchHubSecret;
    }

    /**
     * @param HeaderBag $headers
     * @param bool|resource|string|null $content
     *
     * @link https://gist.github.com/milo/daed6e958ea534e4eba3
     */
    public function validateHubSignature(HeaderBag $headers, $content)
    {
        // Was the hub-signature supplied? If not, exit.
        if (empty($headers->get($this->signatureField))) {
            throw new AccessDeniedHttpException(sprintf("HTTP header '%s' is missing.", $this->signatureField));
        }
        if (!extension_loaded('hash')) {
            throw new AccessDeniedHttpException("Missing 'hash' extension to check the secret code validity.");
        }
        list($algo, $hash) = explode('=', $headers->get($this->signatureField), 2) + array('', '');
        if (!in_array($algo, hash_algos(), TRUE)) {
            throw new AccessDeniedHttpException("Hash algorithm '$algo' is not supported.");
        }

        if ($hash !== hash_hmac($algo, $content, $this->twitchHubSecret)) {
            throw new AccessDeniedHttpException('Hook secret does not match.');
        }
    }
}