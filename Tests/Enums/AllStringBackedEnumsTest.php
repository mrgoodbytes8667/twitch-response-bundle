<?php

namespace Bytes\TwitchResponseBundle\Tests\Enums;

use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Generator;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 *
 */
class AllStringBackedEnumsTest extends TestCase
{
    use TestSerializerTrait, TestEnumTrait, StringBackedEnumClassesTestTrait;

    /**
     * @return Generator
     */
    public static function provideLabelsValues()
    {
        foreach (static::provideStringBackedEnumClasses() as $x) {
            foreach ($x as $class) {
                foreach ($class::cases() as $type) {
                    yield $class . '::' . $type->name => ['label' => $type->name, 'value' => $type->value, 'enum' => $type];
                }
            }
        }
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
     * @dataProvider provideStringBackedEnumClasses
     */
    public function testInvalidValue($enum)
    {
        $this->expectException(ValueError::class);
        $enum::from('abc123');
    }

    /**
     * @dataProvider provideStringBackedEnumClasses
     */
    public function testCoverage($enum)
    {
        $this->coverEnum($enum);
    }
}
