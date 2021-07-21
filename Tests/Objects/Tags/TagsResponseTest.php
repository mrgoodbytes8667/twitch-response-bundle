<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Tags;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Tags\Tag;
use Bytes\TwitchResponseBundle\Objects\Tags\TagsResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class TagsResponseTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Tags
 */
class TagsResponseTest extends TestCase
{
    use TestFakerTrait;

    /**
     *
     */
    public function testGetSetData()
    {
        $localizationTag = $this->faker->languageCode() . '-' . $this->faker->languageCode();
        $tag = new Tag();
        $tag->setTagId($this->faker->uuid())
            ->setAuto($this->faker->boolean())
            ->setLocalizationNames([
                $localizationTag => $this->faker->sentence()
            ])
            ->setLocalizationDescriptions([
                $localizationTag => $this->faker->sentence()
            ]);

        $response = new TagsResponse();
        $this->assertNull($response->getData());
        $response->setData([$tag]);
        $this->assertCount(1, $response->getData());
    }
}