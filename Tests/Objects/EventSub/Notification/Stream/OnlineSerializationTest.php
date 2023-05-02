<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Notification\Stream;

use Bytes\TwitchResponseBundle\Objects\EventSub\Notification\Stream\Online;
use Bytes\TwitchResponseBundle\Tests\TestFullSerializationCase;

class OnlineSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testDeserialization()
    {
        /** @var Online $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('stream-online.json')), Online::class, 'json');

        self::assertNotEmpty($output);

        self::assertEquals('1', $output->getSubscription()->getVersion());

        self::assertEquals('49181050', $output->getEvent()->getBroadcasterUserId());
    }
}
