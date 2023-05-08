<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Games;

use Bytes\TwitchResponseBundle\Objects\Games\Game;
use Bytes\TwitchResponseBundle\Tests\TestFullSerializationCase;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;

/**
 *
 */
class GameSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testDeserialization()
    {
        /** @var Game[] $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('get-games.json')), '\Bytes\TwitchResponseBundle\Objects\Games\Game[]', 'json', [UnwrappingDenormalizer::UNWRAP_PATH => '[data]']);

        self::assertNotEmpty($output);
        self::assertCount(20, $output);
    }

    /**
     * @return void
     */
    public function testSerialization()
    {
        $game = new Game();
        $game->setGameID(123)
            ->setBoxArtURL('https://github.com/sample.image.jpg');

        $data = $this->serializer->serialize($game, 'json');
        self::assertNotEmpty($data);
        self::assertStringNotContainsString('WithSize', $data);
        self::assertStringNotContainsString('profileImage', $data);
    }
}
