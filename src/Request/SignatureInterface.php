<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Interface SignatureInterface
 * @package Bytes\TwitchResponseBundle\Request
 */
interface SignatureInterface
{
    /**
     * Is the signature valid?
     * @param HeaderBag $headers
     * @param bool|resource|string|null $content
     * @param bool $throw If true, will throw exceptions instead of simply returning false.
     * @return bool
     *
     * @throws AccessDeniedHttpException
     */
    public function validateHubSignature(HeaderBag $headers, $content, bool $throw = true): bool;
}