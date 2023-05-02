<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\Tests\Common\TestSerializerTrait;

abstract class TestSerializationCase extends FixtureTestCase
{
    use TestSerializerTrait;

    protected function buildFixtureResponse(string $value, string $label = null)
    {
        return json_encode([
            'label' => $label ?? $value,
            'value' => $value
        ]);
    }
}
