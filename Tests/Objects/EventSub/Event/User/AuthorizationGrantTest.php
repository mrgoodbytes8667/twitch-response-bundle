<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Event\User;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\EventSub\Event\User\AuthorizationGrant;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

class AuthorizationGrantTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetSetUserId($userId)
    {
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getUserId());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserId(null));
        $this->assertNull($authorizationGrant->getUserId());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserId($userId));
        $this->assertEquals($userId, $authorizationGrant->getUserId());
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
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getUserName());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserName(null));
        $this->assertNull($authorizationGrant->getUserName());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserName($userName));
        $this->assertEquals($userName, $authorizationGrant->getUserName());
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
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getClientId());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setClientId(null));
        $this->assertNull($authorizationGrant->getClientId());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setClientId($clientId));
        $this->assertEquals($clientId, $authorizationGrant->getClientId());
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
        $authorizationGrant = new AuthorizationGrant();
        $this->assertNull($authorizationGrant->getUserLogin());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserLogin(null));
        $this->assertNull($authorizationGrant->getUserLogin());
        $this->assertInstanceOf(AuthorizationGrant::class, $authorizationGrant->setUserLogin($userLogin));
        $this->assertEquals($userLogin, $authorizationGrant->getUserLogin());
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