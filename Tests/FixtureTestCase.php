<?php


namespace Bytes\TwitchResponseBundle\Tests;

use PHPUnit\Framework\TestCase;

class FixtureTestCase extends TestCase
{
    /**
     * @param string $file
     * @return string
     */
    public static function getFixturesFile(string $file)
    {
        return __DIR__ . '/Fixtures/' . $file;
    }
}
