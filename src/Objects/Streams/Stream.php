<?php


namespace Bytes\TwitchResponseBundle\Objects\Streams;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchUserInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\StreamTrait;

/**
 * Class Stream
 * @package Bytes\TwitchResponseBundle\Objects\Streams
 *
 * @link https://dev.twitch.tv/docs/api/reference#get-streams
 */
class Stream implements TwitchDateTimeInterface, TwitchUserInterface
{
    use StreamTrait;
}