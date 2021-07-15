<?php


namespace Bytes\TwitchResponseBundle\Normalizer;


/**
 * Class TwitchSanitizer
 * @package Bytes\TwitchResponseBundle\Normalizer
 */
class TwitchSanitizer
{
    /**
     * @param string $login
     * @return string|null
     */
    public static function login(string $login): ?string
    {
        return preg_replace('/[^[:alnum:]_]/', '', strtolower(trim($login)));
    }
}