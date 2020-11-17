<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class EventSubSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
class EventSubSignature extends AbstractSignature implements SignatureInterface
{
    const SIGNATURE_FIELD = 'twitch-eventsub-message-signature';

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

        $check = $headers->get('twitch-eventsub-message-id') . $headers->get('twitch-eventsub-message-timestamp') . $content;

        if ($hash !== hash_hmac($algo, $check, $this->twitchHubSecret)) {
            throw new AccessDeniedHttpException('Hook secret does not match.');
        }
    }
}