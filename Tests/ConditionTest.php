<?php

namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class ConditionTest extends TestSerializationCase
{
    public function testCreateFromArray()
    {
        $serializer = $this->createSerializer();

        $condition = Condition::createFromArray(['broadcasterUserId' => '123']);
        $output = $serializer->serialize($condition, 'json', [
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
            AbstractObjectNormalizer::IGNORED_ATTRIBUTES => [
                'broadcasterOrUserId'
            ]
        ]);

        $this->assertEquals(json_encode(['broadcaster_user_id' => '123']), $output);
    }

    public function testEmptySerialization()
    {
        $serializer = $this->createSerializer();
        $message = new Condition();
        $serializer->serialize($message, 'json');
        $this->addToAssertionCount(1);

        $serializer->serialize($message, 'json', [
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true
        ]);
        $this->addToAssertionCount(1);
    }
}
