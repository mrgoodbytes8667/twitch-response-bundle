<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Games;

use Bytes\TwitchResponseBundle\Objects\Games\Game;
use Bytes\TwitchResponseBundle\Objects\ImageResize;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class GameTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Games
 */
class GameTest extends TestCase
{
    const DESTINY_2_BOX_ART_URL = 'https://static-cdn.jtvnw.net/ttv-boxart/Destiny%202-{width}x{height}.jpg';

    /**
     * @return Generator
     */
    public static function provideGame(): Generator
    {
        yield ['id' => '497057', 'name' => 'Destiny 2', 'boxArtUrl' => self::DESTINY_2_BOX_ART_URL, 'igdbId' => '25657'];
        yield ['id' => 497057, 'name' => 'Destiny 2', 'boxArtUrl' => self::DESTINY_2_BOX_ART_URL, 'igdbId' => 25657];
        yield ['id' => '497057', 'name' => 'Destiny 2', 'boxArtUrl' => self::DESTINY_2_BOX_ART_URL, 'igdbId' => ''];
    }

    /**
     * @dataProvider provideGame
     * @param $id
     * @param string $name
     * @param string $boxArtUrl
     * @param $igdbId
     */
    public function testMake($id, string $name, string $boxArtUrl, $igdbId)
    {
        $game = Game::make($id, $name, $boxArtUrl, $igdbId);

        $game2 = new Game();
        $game2->setGameID($id)
            ->setName($name)
            ->setBoxArtURL($boxArtUrl)
            ->setIgdbId($igdbId);

        $this->assertEquals($game2, $game);
    }

    /**
     * @dataProvider provideGame
     * @param $id
     * @param string $name
     * @param string $boxArtUrl
     * @param $igdbId
     */
    public function testMakeIgdbId($id, string $name, string $boxArtUrl, $igdbId)
    {
        $game = Game::make($id, $name, $boxArtUrl);

        $game2 = new Game();
        $game2->setGameID($id)
            ->setName($name)
            ->setBoxArtURL($boxArtUrl)
            ->setIgdbId('');

        $this->assertEquals($game2, $game);
    }

    /**
     * @dataProvider provideGame
     * @param $id
     * @param string $name
     * @param string $boxArtUrl
     * @param $igdbId
     */
    public function testGetSet($id, string $name, string $boxArtUrl, $igdbId)
    {
        $game = new Game();

        $this->assertNull($game->getGameID());
        $this->assertEmpty($game->getName());
        $this->assertEmpty($game->getBoxArtURL());
        self::assertEmpty($game->getIgdbId());

        $this->assertInstanceOf(Game::class, $game->setGameID($id));
        $this->assertInstanceOf(Game::class, $game->setName($name));
        $this->assertInstanceOf(Game::class, $game->setBoxArtURL($boxArtUrl));
        self::assertInstanceOf(Game::class, $game->setIgdbId($igdbId));

        $this->assertEquals($id, $game->getGameID());
        $this->assertEquals($name, $game->getName());
        $this->assertEquals($boxArtUrl, $game->getBoxArtURL());
        self::assertEquals($igdbId, $game->getIgdbId());

        $this->assertIsString($game->getGameID());
        $this->assertIsNotInt($game->getGameID());
    }

    /**
     * @return void
     */
    public function testBoxArtUrlWithSize()
    {
        $boxArtUrl = self::DESTINY_2_BOX_ART_URL;
        $game = new Game();
        $game->setBoxArtURL($boxArtUrl);

        $boxArtURLWithSize = $game->getBoxArtURLWithSize();
        self::assertStringNotContainsString('{width}', $boxArtURLWithSize);
        self::assertStringNotContainsString('{height}', $boxArtURLWithSize);
        self::assertStringContainsString(ImageResize::WIDTH_TWITCH_GAME_THUMBNAIL, $boxArtURLWithSize);
        self::assertStringContainsString(ImageResize::HEIGHT_TWITCH_GAME_THUMBNAIL, $boxArtURLWithSize);
        self::assertEquals(ImageResize::twitchGameThumbnail($boxArtUrl), $boxArtURLWithSize);
    }
}
