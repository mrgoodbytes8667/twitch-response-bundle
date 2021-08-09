<?php


namespace Bytes\TwitchResponseBundle\Services;


use JetBrains\PhpStorm\Deprecated;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.4.10', 'The "%s" class is deprecated, use "%s" instead.', TwitchImageResize::class, '\Bytes\TwitchClientBundle\Objects\TwitchImageResize');

/**
 * Class TwitchImageResize
 * @package Bytes\TwitchResponseBundle\Services
 *
 * @deprecated since 0.4.10, use \Bytes\TwitchClientBundle\Objects\TwitchImageResize instead
 */
class TwitchImageResize
{
    /**
     *
     */
    const WIDTH_THUMBNAIL = 50;
    /**
     *
     */
    const HEIGHT_THUMBNAIL = 50;

    /**
     *
     */
    const WIDTH_169 = 480;
    /**
     *
     */
    const HEIGHT_169 = 270;

    /**
     *
     */
    const WIDTH_TWITCH_GAME_THUMBNAIL = 85;
    /**
     *
     */
    const HEIGHT_TWITCH_GAME_THUMBNAIL = 113;

    /**
     * @param string $url
     * @param int|null $width
     * @param int|null $height
     *
     * @return string
     */
    #[Deprecated(
        reason: 'Since 0.4.10, use \Bytes\TwitchClientBundle\Objects\TwitchImageResize::thumbnail() instead.',
        replacement: '\Bytes\TwitchClientBundle\Objects\TwitchImageResize::%name%(%parametersList%)'
    )]
    public static function thumbnail(string $url, int $width = null, int $height = null)
    {
        if(empty($url))
        {
            return '';
        }
        if(empty($width))
        {
            $width = static::WIDTH_THUMBNAIL;
        }
        if(empty($height))
        {
            $height = static::HEIGHT_THUMBNAIL;
        }
        return static::resize($url, $width, $height);
    }

    /**
     * @param string $url
     * @param int|null $width
     * @param int|null $height
     *
     * @return string
     */
    #[Deprecated(
        reason: 'Since 0.4.10, use \Bytes\TwitchClientBundle\Objects\TwitchImageResize::twitchGameThumbnail() instead.',
        replacement: '\Bytes\TwitchClientBundle\Objects\TwitchImageResize::%name%(%parametersList%)'
    )]
    public static function twitchGameThumbnail(string $url, int $width = null, int $height = null)
    {
        if(empty($url))
        {
            return '';
        }
        if(empty($width))
        {
            $width = static::WIDTH_TWITCH_GAME_THUMBNAIL;
        }
        if(empty($height))
        {
            $height = static::HEIGHT_TWITCH_GAME_THUMBNAIL;
        }
        return static::resize($url, $width, $height);
    }

    /**
     * @param string $url
     * @param int|null $width
     * @param int|null $height
     *
     * @return string
     */
    #[Deprecated(
        reason: 'Since 0.4.10, use \Bytes\TwitchClientBundle\Objects\TwitchImageResize::sixteenByNine() instead.',
        replacement: '\Bytes\TwitchClientBundle\Objects\TwitchImageResize::%name%(%parametersList%)'
    )]
    public static function sixteenByNine(string $url, int $width = null, int $height = null)
    {
        if(empty($url))
        {
            return '';
        }
        if(empty($width))
        {
            $width = static::WIDTH_169;
        }
        if(empty($height))
        {
            $height = static::HEIGHT_169;
        }
        return static::resize($url, $width, $height);
    }

    /**
     * @param string $url
     * @param int $width
     * @param int $height
     * @return string
     */
    #[Deprecated(
        reason: 'Since 0.4.10, use \Bytes\TwitchClientBundle\Objects\TwitchImageResize::resize() instead.',
        replacement: '\Bytes\TwitchClientBundle\Objects\TwitchImageResize::%name%(%parametersList%)'
    )]
    public static function resize(string $url, int $width, int $height)
    {
        if(empty($url))
        {
            return '';
        }
        return str_replace('{height}', $height, str_replace('{width}', $width, $url ?? ''));
    }

}