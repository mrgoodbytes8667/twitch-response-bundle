<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Enums\TwitchColors;
use Bytes\TwitchResponseBundle\Tests\Enums\StringBackedEnumClassesTestTrait;

class SerializationTest extends TestSerializationCase
{
    use StringBackedEnumClassesTestTrait;

    /**
     * @dataProvider provideStringBackedEnumClasses
     * @param $class
     * @return void
     */
    public function testSerialization($class)
    {
        $serializer = $this->createSerializer();

        foreach ($class::cases() as $enum) {
            $label = $enum->name;
            $value = $enum->value;
            $output = $serializer->serialize($class::from($value), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }
    }

    public function testTwitchColorsSerialization()
    {
        $serializer = $this->createSerializer();

        foreach (TwitchColors::cases() as $enum) {
            $label = $enum->name;
            $value = $enum->value;
            $output = $serializer->serialize(TwitchColors::from($value), 'json');

            $this->assertEquals(json_encode([
                'label' => $label,
                'value' => $value
            ]), $output);
        }
    }
}
