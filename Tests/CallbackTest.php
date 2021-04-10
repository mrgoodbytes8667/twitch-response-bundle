<?php

namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Callback;

class CallbackTest extends TestSerializationCase
{
    public function testSerializationNoErrors()
    {
        $serializer = $this->createSerializer();

        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('callback.json')), Callback::class, 'json');

        $this->addToAssertionCount(1);
    }
}
