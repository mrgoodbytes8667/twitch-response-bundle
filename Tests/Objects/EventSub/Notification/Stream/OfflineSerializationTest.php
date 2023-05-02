<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\Stream;

use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream\Offline;
use Bytes\TwitchResponseBundle\Tests\TestFullSerializationCase;

class OfflineSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testDeserialization()
    {
        /** @var Offline $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('stream-offline.json')), Offline::class, 'json');

        self::assertNotEmpty($output);

        self::assertEquals('1', $output->getSubscription()->getVersion());

        self::assertEquals('85647888', $output->getEvent()->getBroadcasterUserId());
    }
}
