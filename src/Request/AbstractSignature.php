<?php


namespace Bytes\TwitchResponseBundle\Request;


use Bytes\ResponseBundle\Handler\LocatorInterface;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class AbstractSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
abstract class AbstractSignature implements LocatorInterface
{
    /**
     * AbstractSignature constructor.
     * @param string $twitchHubSecret
     */
    public function __construct(protected string $twitchHubSecret)
    {
    }

    /**
     * Is the signature valid?
     * @param HeaderBag $headers
     * @param bool|resource|string|null $content
     * @param bool $throw If true, will throw exceptions instead of simply returning false.
     * @return bool
     *
     * @throws AccessDeniedHttpException
     *
     * @link https://gist.github.com/milo/daed6e958ea534e4eba3
     */
    public function validateHubSignature(HeaderBag $headers, $content, bool $throw = true): bool
    {
        // Was the hub-signature supplied? If not, exit.
        if (empty($headers->get(static::SIGNATURE_FIELD))) {
            if ($throw) {
                throw new AccessDeniedHttpException(sprintf("HTTP header '%s' is missing.", static::SIGNATURE_FIELD));
            } else {
                return false;
            }
        }

        if(!$this->hasHashExtension()) {
            if ($throw) {
                throw new AccessDeniedHttpException("Missing 'hash' extension to check the secret code validity.");
            } else {
                return false;
            }
        }
        list($algo, $hash) = explode('=', $headers->get(static::SIGNATURE_FIELD), 2) + array('', '');
        if (!in_array($algo, hash_algos(), TRUE)) {
            if ($throw) {
                throw new AccessDeniedHttpException("Hash algorithm '$algo' is not supported.");
            } else {
                return false;
            }
        }

        $check = $this->getHashString($headers, $content);

        if ($hash !== hash_hmac($algo, $check, $this->twitchHubSecret)) {
            if ($throw) {
                throw new AccessDeniedHttpException('Hook secret does not match.');
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * @param HeaderBag $headers
     * @param bool|string|null $content
     * @return string
     */
    protected function getHashString(HeaderBag $headers, bool|string|null $content): string
    {
        return $content;
    }

    /**
     * @return bool
     */
    protected function hasHashExtension(): bool
    {
       return extension_loaded('hash');
    }

}