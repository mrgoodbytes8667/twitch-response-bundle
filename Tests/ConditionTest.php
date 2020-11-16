<?php

namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ProblemNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

class ConditionTest extends TestSerializationCase
{
    public function testCreateFromArray()
    {
        $serializer = new Serializer([
            new UnwrappingDenormalizer(),
            new ProblemNormalizer(),
            new JsonSerializableNormalizer(),
            new DateTimeNormalizer(),
            new ConstraintViolationListNormalizer(),
            new DateTimeZoneNormalizer(),
            new DateIntervalNormalizer(),
            new DataUriNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter()),
        ], [new JsonEncoder()]);

        $condition = Condition::createFromArray(['broadcasterUserId' => '123']);
        $output = $serializer->serialize($condition, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $this->assertEquals(json_encode(['broadcaster_user_id' => '123']), $output);
    }

    public function testCreateFromArrayWithoutCamelCaseConversion()
    {
        $serializer = $this->createSerializer();

        $condition = Condition::createFromArray(['broadcasterUserId' => '123']);
        $output = $serializer->serialize($condition, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $this->assertNotEquals(json_encode(['broadcaster_user_id' => '123']), $output);
    }

    public function testEmptySerialization()
    {
        $serializer = $this->createSerializer();
        $message = new Condition();
        $serializer->serialize($message, 'json');
        $this->addToAssertionCount(1);

        $serializer->serialize($message, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->addToAssertionCount(1);
    }
}
