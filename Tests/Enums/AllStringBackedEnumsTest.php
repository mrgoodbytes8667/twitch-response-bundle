<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubMessageType;
use Bytes\TwitchResponseBundle\Enums\EventSubStatus;
use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Enums\OAuthForceVerify;
use Bytes\TwitchResponseBundle\Enums\OAuthScopes;
use Bytes\TwitchResponseBundle\Enums\StreamType;
use Generator;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 *
 */
class AllStringBackedEnumsTest extends TestCase
{
    use TestSerializerTrait, TestEnumTrait;

    /**
     * @return Generator
     */
    public static function provideLabelsValues()
    {
        foreach (static::provideEnumClasses() as $x) {
            foreach ($x as $class) {
                foreach ($class::cases() as $type) {
                    yield $class . '::' . $type->name => ['label' => $type->name, 'value' => $type->value, 'enum' => $type];
                }
            }
        }
    }

    /**
     * @return Generator
     */
    public static function provideEnumClasses()
    {
        yield [EventSubMessageType::class];
        yield [EventSubStatus::class];
        yield [EventSubSubscriptionTypes::class];
        yield [EventSubTransportMethod::class];
        yield [OAuthForceVerify::class];
        yield [OAuthScopes::class];
        yield [StreamType::class];
    }

    /**
     * @dataProvider provideLabelsValues
     * @param $label
     * @param $value
     * @param $enum
     */
    public function testEnum($label, $value, $enum)
    {
        $created = $enum::from($value);
        static::assertInstanceOf($enum::class, $created);
        static::assertEquals($label, $created->name);
        static::assertEquals($value, $created->value);
        static::assertEquals($enum, $created);
    }

    /**
     * @dataProvider provideLabelsValues
     * @param $label
     * @param $value
     */
    public function testEnumSerialization($label, $value, $enum)
    {
        $serializer = $this->createSerializer();
        $enum = $enum::from($value);

        $output = $serializer->serialize($enum, 'json');

        $this->assertEquals(json_encode([
            'label' => $label,
            'value' => $value
        ]), $output);
    }

    /**
     * @dataProvider provideEnumClasses
     */
    public function testInvalidValue($enum)
    {
        $this->expectException(ValueError::class);
        $enum::from('abc123');
    }

    /**
     * @dataProvider provideEnumClasses
     */
    public function testCoverage($enum)
    {
        $this->coverEnum($enum);
    }
}
