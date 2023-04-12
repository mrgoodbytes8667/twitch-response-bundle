<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\OAuth2;

use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\ResponseBundle\Enums\TokenSource;
use Bytes\ResponseBundle\Objects\ComparableDateInterval;
use Bytes\ResponseBundle\Token\Interfaces\AccessTokenInterface;
use Bytes\TwitchResponseBundle\Objects\OAuth2\Token;
use DateInterval;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\OAuth2
 */
class TokenTest extends TestCase
{
    use TestTwitchFakerTrait;

    /**
     *
     */
    public function testGetSetAccessToken()
    {
        $accessToken = $this->faker->accessToken();

        $token = new Token();
        $this->assertNull($token->getAccessToken());

        $this->assertInstanceOf(Token::class, $token->setAccessToken(null));
        $this->assertNull($token->getAccessToken());

        $this->assertInstanceOf(Token::class, $token->setAccessToken($accessToken));
        $this->assertEquals($accessToken, $token->getAccessToken());
    }

    /**
     *
     */
    public function testGetSetRefreshToken()
    {
        $refreshToken = $this->faker->refreshToken();

        $token = new Token();
        $this->assertNull($token->getRefreshToken());

        $this->assertInstanceOf(Token::class, $token->setRefreshToken(null));
        $this->assertNull($token->getRefreshToken());

        $this->assertInstanceOf(Token::class, $token->setRefreshToken($refreshToken));
        $this->assertEquals($refreshToken, $token->getRefreshToken());
    }

    /**
     *
     */
    public function testGetSetExpiresIn()
    {
        $expiresIn = $this->faker->numberBetween(1, 500000);

        $token = new Token();
        $this->assertNull($token->getExpiresIn());

        $this->assertInstanceOf(Token::class, $token->setExpiresIn(null));
        $this->assertNull($token->getExpiresIn());

        $this->assertInstanceOf(Token::class, $token->setExpiresIn($expiresIn));
        $this->assertObjectEquals(ComparableDateInterval::create($expiresIn), ComparableDateInterval::create($token->getExpiresIn()), 'equals');
    }

    /**
     *
     */
    public function testGetSetScope()
    {
        $scopes = ["channel:read:hype_train", "user:read:email"];

        $token = new Token();
        $this->assertEmpty($token->getScope());

        $this->assertInstanceOf(Token::class, $token->setScope($scopes));
        $this->assertEquals("channel:read:hype_train user:read:email", $token->getScope());

        $this->assertInstanceOf(Token::class, $token->setScope("channel:read:hype_train user:read:email"));
        $this->assertEquals("channel:read:hype_train user:read:email", $token->getScope());
    }

    /**
     *
     */
    public function testGetSetTokenType()
    {
        $tokenType = 'bearer';

        $token = new Token();
        $this->assertNull($token->getTokenType());

        $this->assertInstanceOf(Token::class, $token->setTokenType(null));
        $this->assertNull($token->getTokenType());

        $this->assertInstanceOf(Token::class, $token->setTokenType($tokenType));
        $this->assertEquals($tokenType, $token->getTokenType());
    }

    /**
     *
     */
    public function testCreateFromAccessToken()
    {
        $accessToken = $this->faker->accessToken();

        $token = Token::createFromAccessToken($accessToken);

        $this->assertInstanceOf(Token::class, $token);
        $this->assertEquals($accessToken, $token->getAccessToken());
    }

    /**
     * @dataProvider provideAccessTokenValues
     * @param $accessToken1
     * @param $refreshToken1
     * @param $expiresIn1
     * @param $scope1
     * @param $tokenType1
     * @param $accessToken2
     * @param $refreshToken2
     * @param $expiresIn2
     * @param $scope2
     * @param $tokenType2
     */
    public function testUpdateFromAccessToken($accessToken1, $refreshToken1, $expiresIn1, $scope1, $tokenType1, $accessToken2, $refreshToken2, $expiresIn2, $scope2, $tokenType2)
    {
        $token = new Token();
        $token->setAccessToken($accessToken1)
            ->setRefreshToken($refreshToken1)
            ->setExpiresIn($expiresIn1)
            ->setScope($scope1)
            ->setTokenType($tokenType1);

        $this->assertEquals($accessToken1, $token->getAccessToken());
        $this->assertEquals($refreshToken1, $token->getRefreshToken());
        $this->assertEquals($expiresIn1, $token->getExpiresIn());
        $this->assertEquals($scope1, $token->getScope());
        $this->assertEquals($tokenType1, $token->getTokenType());

        $newToken = new Token();
        $newToken->setAccessToken($accessToken2)
            ->setRefreshToken($refreshToken2)
            ->setExpiresIn($expiresIn2)
            ->setScope($scope2)
            ->setTokenType($tokenType2);

        $this->assertEquals($accessToken2, $newToken->getAccessToken());
        $this->assertEquals($refreshToken2, $newToken->getRefreshToken());
        $this->assertEquals($expiresIn2, $newToken->getExpiresIn());
        $this->assertEquals($scope2, $newToken->getScope());
        $this->assertEquals($tokenType2, $newToken->getTokenType());

        $token->updateFromAccessToken($newToken);

        $this->assertEquals($accessToken2, $token->getAccessToken());
        $this->assertEquals($refreshToken2, $token->getRefreshToken());
        $this->assertEquals($expiresIn2, $token->getExpiresIn());
        $this->assertEquals($scope2, $token->getScope());
        $this->assertEquals($tokenType2, $token->getTokenType());
    }

    /**
     * @return Generator
     */
    public function provideAccessTokenValues()
    {
        $this->setupFaker();

        yield ['accessToken1' => $this->faker->accessToken(), 'refreshToken1' => $this->faker->refreshToken(), 'expiresIn1' => new DateInterval('PT' . $this->faker->numberBetween() . 'S'), 'scope1' => $this->faker->words(asText: true), 'tokenType1' => 'bearer',
            'accessToken2' => $this->faker->accessToken(), 'refreshToken2' => $this->faker->refreshToken(), 'expiresIn2' => new DateInterval('PT' . $this->faker->numberBetween() . 'S'), 'scope2' => $this->faker->words(asText: true), 'tokenType2' => 'bearer'];
    }

    /**
     * @throws Exception
     */
    public function testCreateFromParts()
    {
        $token = Token::createFromParts(accessToken: $this->faker->accessToken(), tokenSource: TokenSource::app);
        $this->assertInstanceOf(AccessTokenInterface::class, $token);
    }
}
