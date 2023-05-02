<?php

namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Callback;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;

class CallbackTest extends TestFullSerializationCase
{
    public function testSerializationNoErrors()
    {
        /** @var Callback $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('callback.json')), Callback::class, 'json');

        self::assertEquals('pogchamp-kappa-360noscope-vohiyo', $output->getChallenge());
        self::assertInstanceOf(Subscription::class, $output->getSubscription());
        self::assertEquals('12826', $output->getSubscription()->getCondition()->getBroadcasterUserId());
        self::assertNull($output->getSubscription()->getCondition()->getUserId());
    }
}
