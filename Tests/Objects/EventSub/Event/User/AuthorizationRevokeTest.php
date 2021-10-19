<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\User;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\AuthorizationRevoke;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

class AuthorizationRevokeTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetSetUserId($userId)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getUserId());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserId(null));
        $this->assertNull($authorizationRevoke->getUserId());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserId($userId));
        $this->assertEquals($userId, $authorizationRevoke->getUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetSetUserName($userName)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getUserName());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserName(null));
        $this->assertNull($authorizationRevoke->getUserName());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserName($userName));
        $this->assertEquals($userName, $authorizationRevoke->getUserName());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideClientId
     * @param mixed $clientId
     */
    public function testGetSetClientId($clientId)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getClientId());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setClientId(null));
        $this->assertNull($authorizationRevoke->getClientId());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setClientId($clientId));
        $this->assertEquals($clientId, $authorizationRevoke->getClientId());
    }

    /**
     * @return Generator
     */
    public function provideClientId()
    {
        $this->setupFaker();
        yield [$this->faker->id()];
    }

    /**
     * @dataProvider provideUserLogin
     * @param mixed $userLogin
     */
    public function testGetSetUserLogin($userLogin)
    {
        $authorizationRevoke = new AuthorizationRevoke();
        $this->assertNull($authorizationRevoke->getUserLogin());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserLogin(null));
        $this->assertNull($authorizationRevoke->getUserLogin());
        $this->assertInstanceOf(AuthorizationRevoke::class, $authorizationRevoke->setUserLogin($userLogin));
        $this->assertEquals($userLogin, $authorizationRevoke->getUserLogin());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideUserLogin()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }
}