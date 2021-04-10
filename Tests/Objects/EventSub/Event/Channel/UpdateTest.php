<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\Channel;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\Channel\Update;
use Generator;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    use TestFakerTrait;

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
    public function testGetSetUserId($userId)
    {
        $update = new Update();
        $this->assertNull($update->getUserId());
        $this->assertInstanceOf(Update::class, $update->setUserId(null));
        $this->assertNull($update->getUserId());
        $this->assertInstanceOf(Update::class, $update->setUserId($userId));
        $this->assertEquals($userId, $update->getUserId());
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
    public function testGetSetUserName($userName)
    {
        $update = new Update();
        $this->assertNull($update->getUserName());
        $this->assertInstanceOf(Update::class, $update->setUserName(null));
        $this->assertNull($update->getUserName());
        $this->assertInstanceOf(Update::class, $update->setUserName($userName));
        $this->assertEquals($userName, $update->getUserName());
    }

    /**
     * @return Generator
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }
}
