<?php


namespace Bytes\TwitchResponseBundle\Request;


use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Interface SignatureInterface
 * @package Bytes\TwitchResponseBundle\Request
 */
interface SignatureInterface
{
    /**
     * @param HeaderBag $headers
     * @param bool|resource|string|null $content
     */
    public function validateHubSignature(HeaderBag $headers, $content);
}