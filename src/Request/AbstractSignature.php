<?php


namespace Bytes\TwitchResponseBundle\Request;


/**
 * Class AbstractSignature
 * @package Bytes\TwitchResponseBundle\Request
 */
abstract class AbstractSignature
{
    /**
     * @var string
     */
    protected $twitchHubSecret;

    /**
     * AbstractSignature constructor.
     * @param string $twitchHubSecret
     */
    public function __construct(string $twitchHubSecret)
    {
        $this->twitchHubSecret = $twitchHubSecret;
    }
}