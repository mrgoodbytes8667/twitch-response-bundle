<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Streams;

use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream\Online;
use Bytes\TwitchResponseBundle\Objects\Streams\Stream;
use Bytes\TwitchResponseBundle\Tests\TestFullSerializationCase;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;

/**
 *
 */
class StreamSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testDeserialization()
    {
        /** @var Stream[] $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('get-streams.json')), '\Bytes\TwitchResponseBundle\Objects\Streams\Stream[]', 'json', [UnwrappingDenormalizer::UNWRAP_PATH => '[data]']);

        self::assertNotEmpty($output);
        self::assertCount(2, $output);
    }
}
