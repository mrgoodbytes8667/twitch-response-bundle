<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\User;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\Update;
use Generator;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    use TestFakerTrait;

    /**
     * @dataProvider provideEmail
     * @param mixed $email
     */
    public function testGetSetEmail($email)
    {
        $update = new Update();
        $this->assertNull($update->getEmail());
        $this->assertInstanceOf(Update::class, $update->setEmail(null));
        $this->assertNull($update->getEmail());
        $this->assertInstanceOf(Update::class, $update->setEmail($email));
        $this->assertEquals($email, $update->getEmail());
    }

    /**
     * @return Generator
     */
    public function provideEmail()
    {
        $this->setupFaker();
        yield [$this->faker->email()];
        yield [null];
    }

    /**
     * @dataProvider provideDescription
     * @param mixed $description
     */
    public function testGetSetDescription($description)
    {
        $update = new Update();
        $this->assertNull($update->getDescription());
        $this->assertInstanceOf(Update::class, $update->setDescription(null));
        $this->assertNull($update->getDescription());
        $this->assertInstanceOf(Update::class, $update->setDescription($description));
        $this->assertEquals($description, $update->getDescription());
    }

    /**
     * @return Generator
     */
    public function provideDescription()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
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
