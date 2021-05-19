<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\OAuth2;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Objects\OAuth2\Validate;
use DateTimeImmutable;
use Exception;
use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidateTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\OAuth2
 */
class ValidateTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     *
     */
    public function testGetClientId()
    {
        $validate = new Validate();
        $clientId = $this->faker->id();
        $this->assertNull($validate->getClientId());
        $this->assertInstanceOf(Validate::class, $validate->setClientId($clientId));
        $this->assertEquals($clientId, $validate->getClientId());
    }

    /**
     * @dataProvider provideIsAppToken
     * @param $username
     * @param $scopes
     * @param $userId
     * @param $result
     */
    public function testIsAppToken($username, $scopes, $userId, $result)
    {
        $validate = Validate::create(clientId: $this->faker->id(), userName: $username, scopes: $scopes, userId: $userId);

        $this->assertEquals($result, $validate->isAppToken());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideIsAppToken()
    {
        $this->setupFaker();
        yield ['username' => null, 'scopes' => null, 'userId' => null, 'result' => true];
        yield ['username' => $this->faker->userName(), 'scopes' => $this->faker->words(), 'userId' => $this->faker->id(), 'result' => false];
    }

    /**
     *
     */
    public function testIsAppTokenInvalidArgument()
    {
        $validate = Validate::create();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A client id must be present for the comparison to be possible.');
        $validate->isAppToken();
    }

    /**
     * @dataProvider provideCreate
     * @param $clientId
     * @param $username
     * @param $scopes
     * @param $userId
     */
    public function testCreate($clientId, $username, $scopes, $userId)
    {
        $validate = Validate::create(clientId: $clientId, userName: $username, scopes: $scopes, userId: $userId);
        $this->assertEquals($clientId, $validate->getClientId());
        $this->assertEquals($username, $validate->getUserName());
        $this->assertEquals($scopes, $validate->getScopes());
        $this->assertEquals($userId, $validate->getUserId());
        $this->assertFalse($validate->isAppToken());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideCreate()
    {
        $this->setupFaker();
        yield ['clientId' => $this->faker->id(), 'username' => $this->faker->userName(), 'scopes' => $this->faker->words(), 'userId' => $this->faker->id()];
    }

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetUserId($userId)
    {
        $validate = new Validate();

        $this->assertNull($validate->getUserId());

        $this->assertInstanceOf(Validate::class, $validate->setUserId($userId));
        $this->assertEquals($userId, $validate->getUserId());
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
     *
     */
    public function testGetScopes()
    {
        $scopes = $this->faker->words(3);

        $validate = new Validate();
        $this->assertNull($validate->getScopes());
        $this->assertInstanceOf(Validate::class, $validate->setScopes($scopes));
        $this->assertCount(3, $validate->getScopes());
    }

    /**
     * @dataProvider provideExpired
     * @param int $date
     * @param bool $expired
     */
    public function testHasExpired(int $date, bool $expired)
    {
        $user = new Validate();
        $this->assertTrue($user->hasExpired());
        $user->setExpiresIn($date);
        $this->assertEquals($expired, $user->hasExpired());
    }

    /**
     * @return\Generator
     */
    public function provideExpired()
    {
        $this->setupFaker();
        yield ['date' => 0, 'expired' => true];
        yield ['date' => $this->faker->randomDigitNotZero() * 100, 'expired' => false];
    }

    /**
     *
     */
    public function testGetSetExpiresInAt()
    {
        $now = new DateTimeImmutable();
        $expiresIn = $this->faker->numberBetween(1000, 5000);
        $validate = Validate::create();
        $this->assertNull($validate->getExpiresIn());
        $this->assertInstanceOf(Validate::class, $validate->setExpiresIn($expiresIn));
        $this->assertEquals($expiresIn, $validate->getExpiresIn());
        $this->assertGreaterThan($now, $validate->getExpiresAt());


        $validate = Validate::create(expiresIn: $expiresIn);
        $this->assertEquals($expiresIn, $validate->getExpiresIn());
        $this->assertGreaterThan($now, $validate->getExpiresAt());
    }

    /**
     * @dataProvider provideMatch
     * @param $clientId
     * @param $username
     * @param $scopes
     * @param $userId
     * @param $expiresIn
     * @throws Exception
     */
    public function testHasMatches($clientId, $username, $scopes, $userId, $expiresIn)
    {
        $validate = new Validate();
        $validate->setClientId($clientId)
            ->setUserName($username)
            ->setScopes($scopes)
            ->setUserId($userId)
            ->setExpiresIn($expiresIn);

        $this->assertTrue($validate->hasMatchingClientId($clientId));
        $this->assertFalse($validate->hasMatchingClientId($this->faker->id()));
        $this->assertFalse($validate->hasMatchingClientId(''));

        $this->assertTrue($validate->hasMatchingUserId($userId));
        $this->assertFalse($validate->hasMatchingUserId($this->faker->id()));
        $this->assertFalse($validate->hasMatchingUserId(''));

        $this->assertTrue($validate->hasMatchingUserName($username));
        $this->assertFalse($validate->hasMatchingUserName($this->faker->userName()));
        $this->assertFalse($validate->hasMatchingUserName(''));

        $this->assertTrue($validate->isMatch(clientId: $clientId, userName: $username, userId: $userId));
        $this->assertFalse($validate->isMatch(clientId: $this->faker->id(), userName: $this->faker->userName(), userId: $this->faker->id()));
    }

    /**
     * @return Generator
     */
    public function provideMatch()
    {
        $this->setupFaker();

        $clientId = $this->faker->id();
        $username = $this->faker->userName();
        $scopes = $this->faker->words(3);
        $userId = $this->faker->id();
        $expiresIn = $this->faker->numberBetween(100, 5000);
        yield ['clientId' => $clientId, 'username' => $username, 'scopes' => $scopes, 'userId' => $userId, 'expiresIn' => $expiresIn];
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetUserName($userName)
    {
        $validate = new Validate();

        $this->assertNull($validate->getUserName());
        $this->assertInstanceOf(Validate::class, $validate->setUserName($userName));
        $this->assertEquals($userName, $validate->getUserName());
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
}
