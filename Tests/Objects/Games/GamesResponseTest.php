<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Games;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Games\Game;
use Bytes\TwitchResponseBundle\Objects\Games\GamesResponse;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class GamesResponseTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testGetSetData($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $this->assertNull($g->getData());
        $this->assertInstanceOf(GamesResponse::class, $g->setData(null));
        $this->assertNull($g->getData());
        $this->assertInstanceOf(GamesResponse::class, $g->setData([]));
        $this->assertCount(0, $g->getData());

        $this->assertInstanceOf(GamesResponse::class, $g->setData($games));
        $this->assertCount($count, $g->getData());
        $this->assertEquals($games, $g->getData());

        return $g;
    }

    /**
     * @return Generator
     */
    public function provideGames()
    {
        $this->setupFaker();

        $games = [];
        $firstGame = $this->buildGame();
        $games[] = $firstGame;
        foreach (range(1, 3) as $i) {
            $games[] = $this->buildGame();
        }
        $lastGame = $this->buildGame();
        $games[] = $lastGame;

        yield ['games' => $games, 'count' => 5, 'first' => $firstGame, 'last' => $lastGame];
    }

    /**
     * @return Game
     */
    private function buildGame(): Game
    {
        $game = new Game();
        $game->setGameID($this->faker->id())
            ->setName($this->faker->sentence(2))
            ->setBoxArtURL($this->faker->imageUrl());
        return $game;
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testCount($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $this->assertCount($count, $g->getData());
        $this->assertEquals($count, $g->count());
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testFirst($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $this->assertEquals($first, $g->first());
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testLast($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $this->assertEquals($last, $g->last());
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testGet($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $game = $g->getData()[2];
        $this->assertEquals($game, $g->get(2));
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testRandom($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $this->assertInstanceOf(Game::class, $g->random());
    }

    /**
     *
     */
    public function testRandomNull()
    {
        $g = new GamesResponse();
        $this->assertNull($g->random());
    }

    /**
     * @dataProvider provideGames
     * @param $games
     * @param $count
     * @param $first
     * @param $last
     */
    public function testPointers($games, $count, $first, $last)
    {
        $g = new GamesResponse();
        $g->setData($games);

        $game = $g->getData()[2];
        $this->assertEquals($game, $g->get(2));

        $this->assertEquals($first, $g->first());
        $this->assertEquals($game, $g->get(2));
        $this->assertEquals($last, $g->last());
        $this->assertEquals($game, $g->get(2));
        $this->assertEquals($last, $g->last());
        $this->assertEquals($game, $g->get(2));
        $this->assertEquals($first, $g->first());
    }
}