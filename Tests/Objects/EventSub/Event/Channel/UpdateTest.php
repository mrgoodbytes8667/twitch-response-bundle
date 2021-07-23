<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Channel;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\Tests\Common\TestFullSerializerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Channel\Update;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Channel
 */
class UpdateTest extends TestCase
{
    use TestFakerTrait, TestFullSerializerTrait;

    /**
     * @dataProvider provideTitle
     * @param mixed $title
     */
    public function testGetSetTitle($title)
    {
        $update = new Update();
        $this->assertNull($update->getTitle());
        $this->assertInstanceOf(Update::class, $update->setTitle(null));
        $this->assertNull($update->getTitle());
        $this->assertInstanceOf(Update::class, $update->setTitle($title));
        $this->assertEquals($title, $update->getTitle());
    }

    /**
     * @return Generator
     */
    public function provideTitle()
    {
        $this->setupFaker();
        yield [(string)$this->faker->sentence()];
    }

    /**
     * @dataProvider provideLanguage
     * @param mixed $language
     */
    public function testGetSetLanguage($language)
    {
        $update = new Update();
        $this->assertNull($update->getLanguage());
        $this->assertInstanceOf(Update::class, $update->setLanguage(null));
        $this->assertNull($update->getLanguage());
        $this->assertInstanceOf(Update::class, $update->setLanguage($language));
        $this->assertEquals($language, $update->getLanguage());
    }

    /**
     * @return Generator
     */
    public function provideLanguage()
    {
        $this->setupFaker();
        foreach(range(1, 100) as $i) {
            yield [(string)$this->faker->unique()->languageCode()];
        }
    }

    /**
     * @dataProvider provideCategoryId
     * @param mixed $categoryId
     */
    public function testGetSetCategoryId($categoryId)
    {
        $update = new Update();
        $this->assertNull($update->getCategoryId());
        $this->assertInstanceOf(Update::class, $update->setCategoryId(null));
        $this->assertNull($update->getCategoryId());
        $this->assertInstanceOf(Update::class, $update->setCategoryId($categoryId));
        $this->assertEquals($categoryId, $update->getCategoryId());
    }

    /**
     * @return Generator
     */
    public function provideCategoryId()
    {
        $this->setupFaker();
        yield [(string)$this->faker->numberBetween(1)];
    }

    /**
     * @dataProvider provideCategoryName
     * @param mixed $categoryName
     */
    public function testGetSetCategoryName($categoryName)
    {
        $update = new Update();
        $this->assertNull($update->getCategoryName());
        $this->assertInstanceOf(Update::class, $update->setCategoryName(null));
        $this->assertNull($update->getCategoryName());
        $this->assertInstanceOf(Update::class, $update->setCategoryName($categoryName));
        $this->assertEquals($categoryName, $update->getCategoryName());
    }

    /**
     * @return Generator
     */
    public function provideCategoryName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideIsMature
     * @param mixed $isMature
     */
    public function testGetSetIsMature($isMature)
    {
        $update = new Update();
        $this->assertNull($update->getIsMature());
        $this->assertInstanceOf(Update::class, $update->setIsMature(null));
        $this->assertNull($update->getIsMature());
        $this->assertInstanceOf(Update::class, $update->setIsMature($isMature));
        $this->assertEquals($isMature, $update->getIsMature());
    }

    /**
     * @return Generator
     */
    public function provideIsMature()
    {
        $this->setupFaker();
        yield [$this->faker->boolean()];
    }

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetSetBroadcasterUserId($userId)
    {
        $update = new Update();
        $this->assertNull($update->getBroadcasterUserId());
        $this->assertInstanceOf(Update::class, $update->setBroadcasterUserId(null));
        $this->assertNull($update->getBroadcasterUserId());
        $this->assertInstanceOf(Update::class, $update->setBroadcasterUserId($userId));
        $this->assertEquals($userId, $update->getBroadcasterUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [(string)$this->faker->numberBetween(1)];
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetSetBroadcasterUserName($userName)
    {
        $update = new Update();
        $this->assertNull($update->getBroadcasterUserName());
        $this->assertInstanceOf(Update::class, $update->setBroadcasterUserName(null));
        $this->assertNull($update->getBroadcasterUserName());
        $this->assertInstanceOf(Update::class, $update->setBroadcasterUserName($userName));
        $this->assertEquals($userName, $update->getBroadcasterUserName());
    }

    /**
     * @return Generator
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     *
     */
    public function testDeserialization()
    {
        $json = '{
  "broadcaster_user_id": "111111111",
  "broadcaster_user_login": "fakeuser1",
  "broadcaster_user_name": "FaKeUsEr1",
  "title": "Testing testing 4 5 6",
  "language": "en",
  "category_id": "509658",
  "category_name": "Just Chatting",
  "is_mature": false
}';

        /** @var Update $results */
        $results = $this->serializer->deserialize($json, Update::class, 'json');

        $this->assertInstanceOf(Update::class, $results);
        $this->assertEquals('Testing testing 4 5 6', $results->getTitle());
        $this->assertEquals('en', $results->getLanguage());
        $this->assertEquals('509658', $results->getCategoryId());
        $this->assertEquals('Just Chatting', $results->getCategoryName());
        $this->assertFalse($results->getIsMature());
        $this->assertEquals('111111111', $results->getBroadcasterUserId());
        $this->assertEquals('FaKeUsEr1', $results->getBroadcasterUserName());
        $this->assertEquals('111111111', $results->getUserId());
        $this->assertEquals('FaKeUsEr1', $results->getUserName());

        $this->assertNotEmpty($results);
    }
}
