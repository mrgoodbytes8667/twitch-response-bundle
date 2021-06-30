<?php


namespace Bytes\TwitchResponseBundle\Objects\Streams;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\StreamTrait;

/**
 * Class Stream
 * @package Bytes\TwitchResponseBundle\Objects\Streams
 */
class Stream implements TwitchDateTimeInterface
{
    use StreamTrait;
}