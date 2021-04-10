<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class WebhookSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
class WebhookSignature extends AbstractSignature implements SignatureInterface
{
    const SIGNATURE_FIELD = 'X-Hub-Signature';

    /**
     * @param HeaderBag $headers
     * @param bool|resource|string|null $content
     *
     * @link https://gist.github.com/milo/daed6e958ea534e4eba3
     */
    public function validateHubSignature(HeaderBag $headers, $content)
    {
        // Was the hub-signature supplied? If not, exit.
        if (empty($headers->get(self::SIGNATURE_FIELD))) {
            throw new AccessDeniedHttpException(sprintf("HTTP header '%s' is missing.", self::SIGNATURE_FIELD));
        }
        if (!extension_loaded('hash')) {
            throw new AccessDeniedHttpException("Missing 'hash' extension to check the secret code validity.");
        }
        list($algo, $hash) = explode('=', $headers->get(self::SIGNATURE_FIELD), 2) + array('', '');
        if (!in_array($algo, hash_algos(), TRUE)) {
            throw new AccessDeniedHttpException("Hash algorithm '$algo' is not supported.");
        }

        if ($hash !== hash_hmac($algo, $content, $this->twitchHubSecret)) {
            throw new AccessDeniedHttpException('Hook secret does not match.');
        }
    }
}