<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Tags;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Tags\Tag;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class TagTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Tags
 */
class TagTest extends TestCase
{
    use TestFakerTrait;

    /**
     * @dataProvider provideTagId
     * @param mixed $tagId
     */
    public function testGetSetTagId($tagId)
    {
        $tag = new Tag();
        $this->assertNull($tag->getTagId());
        $this->assertInstanceOf(Tag::class, $tag->setTagId(null));
        $this->assertNull($tag->getTagId());
        $this->assertInstanceOf(Tag::class, $tag->setTagId($tagId));
        $this->assertEquals($tagId, $tag->getTagId());
    }

    /**
     * @return Generator
     */
    public function provideTagId()
    {
        $this->setupFaker();
        yield [$this->faker->uuid()];
    }

    /**
     * @dataProvider provideAuto
     * @param mixed $auto
     */
    public function testGetSetAuto($auto)
    {
        $tag = new Tag();
        $this->assertNull($tag->isAuto());
        $this->assertInstanceOf(Tag::class, $tag->setAuto(null));
        $this->assertNull($tag->isAuto());
        $this->assertInstanceOf(Tag::class, $tag->setAuto($auto));
        $this->assertEquals($auto, $tag->isAuto());
    }

    /**
     * @return Generator
     */
    public function provideAuto()
    {
        yield [true];
        yield [false];
    }

    /**
     * @dataProvider provideLocalizationNames
     * @param mixed $localizationNames
     */
    public function testGetSetLocalizationNames($localizationNames)
    {
        $tag = new Tag();
        $this->assertNull($tag->getLocalizationNames());
        $this->assertInstanceOf(Tag::class, $tag->setLocalizationNames(null));
        $this->assertNull($tag->getLocalizationNames());
        $this->assertInstanceOf(Tag::class, $tag->setLocalizationNames($localizationNames));
        $this->assertEquals($localizationNames, $tag->getLocalizationNames());
    }

    /**
     * @return Generator
     */
    public function provideLocalizationNames()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }

    /**
     * @dataProvider provideLocalizationDescriptions
     * @param mixed $localizationDescriptions
     */
    public function testGetSetLocalizationDescriptions($localizationDescriptions)
    {
        $tag = new Tag();
        $this->assertNull($tag->getLocalizationDescriptions());
        $this->assertInstanceOf(Tag::class, $tag->setLocalizationDescriptions(null));
        $this->assertNull($tag->getLocalizationDescriptions());
        $this->assertInstanceOf(Tag::class, $tag->setLocalizationDescriptions($localizationDescriptions));
        $this->assertEquals($localizationDescriptions, $tag->getLocalizationDescriptions());
    }

    /**
     * @return Generator
     */
    public function provideLocalizationDescriptions()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }
}