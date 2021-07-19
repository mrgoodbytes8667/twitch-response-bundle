<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Games;

use Bytes\TwitchResponseBundle\Objects\Games\Game;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class GameTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Games
 */
class GameTest extends TestCase
{

    /**
     * @dataProvider provideGame
     * @param $id
     * @param string $name
     * @param string $boxArtUrl
     */
    public function testMake($id, string $name, string $boxArtUrl)
    {
        $game = Game::make($id, $name, $boxArtUrl);

        $game2 = new Game();
        $game2->setGameID($id)
            ->setName($name)
            ->setBoxArtURL($boxArtUrl);

        $this->assertEquals($game2, $game);
    }

    /**
     * @dataProvider provideGame
     * @param $id
     * @param string $name
     * @param string $boxArtUrl
     */
    public function testGetSet($id, string $name, string $boxArtUrl)
    {
        $game = new Game();

        $this->assertNull($game->getGameID());
        $this->assertEmpty($game->getName());
        $this->assertEmpty($game->getBoxArtURL());

        $this->assertInstanceOf(Game::class, $game->setGameID($id));
        $this->assertInstanceOf(Game::class, $game->setName($name));
        $this->assertInstanceOf(Game::class, $game->setBoxArtURL($boxArtUrl));

        $this->assertEquals($id, $game->getGameID());
        $this->assertEquals($name, $game->getName());
        $this->assertEquals($boxArtUrl, $game->getBoxArtURL());

        $this->assertIsString($game->getGameID());
        $this->assertIsNotInt($game->getGameID());
    }

    /**
     * @return Generator
     */
    public function provideGame()
    {
        yield ['id' => '497057', 'name' => 'Destiny 2', 'boxArtUrl' => 'https://static-cdn.jtvnw.net/ttv-boxart/Destiny%202-{width}x{height}.jpg'];
        yield ['id' => 497057, 'name' => 'Destiny 2', 'boxArtUrl' => 'https://static-cdn.jtvnw.net/ttv-boxart/Destiny%202-{width}x{height}.jpg'];
    }
}
