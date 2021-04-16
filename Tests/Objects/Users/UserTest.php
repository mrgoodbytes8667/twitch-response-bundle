<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Users;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Objects\Interfaces\UserInterface;
use Bytes\TwitchResponseBundle\Objects\Users\User;
use Exception;
use PHPUnit\Framework\TestCase;
use function Symfony\Component\String\u;

/**
 * Class UserTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Users
 */
class UserTest extends TestCase
{
    use TestFakerTrait;

    /**
     * @var User
     */
    private $user;

    /**
     * @before
     */
    protected function setupUser()
    {
        $this->user = new User();
    }

    /**
     * @after
     */
    protected function tearDownUser()
    {
        $this->user = null;
    }

    /**
     *
     */
    public function testGetSetId()
    {
        $id = (string)$this->faker->numberBetween(1);
        $this->assertNull($this->user->getId());
        $this->assertInstanceOf(User::class, $this->user->setId(null));
        $this->assertNull($this->user->getId());
        $this->assertInstanceOf(User::class, $this->user->setId($id));
        $this->assertEquals($id, $this->user->getId());
    }

    /**
     *
     */
    public function testGetSetType()
    {
        $type = $this->faker->randomElement(["staff", "admin", "global_mod", ""]);
        $this->assertNull($this->user->getType());
        $this->assertInstanceOf(User::class, $this->user->setType(null));
        $this->assertNull($this->user->getType());
        $this->assertInstanceOf(User::class, $this->user->setType($type));
        $this->assertEquals($type, $this->user->getType());
    }

    /**
     *
     */
    public function testGetSetViewCount()
    {
        $viewCount = $this->faker->numberBetween();
        $this->assertEquals(0, $this->user->getViewCount());

        $this->assertInstanceOf(User::class, $this->user->setViewCount(null));
        $this->assertEquals(0, $this->user->getViewCount());

        $this->assertInstanceOf(User::class, $this->user->setViewCount());
        $this->assertEquals(0, $this->user->getViewCount());

        $this->assertInstanceOf(User::class, $this->user->setViewCount($viewCount));
        $this->assertEquals($viewCount, $this->user->getViewCount());
    }

    /**
     * @throws Exception
     */
    public function testGetSetLogin()
    {
        $login = u($this->faker->userName())->lower()->toString();
        $this->assertNull($this->user->getLogin());
        $this->assertInstanceOf(User::class, $this->user->setLogin(null));
        $this->assertNull($this->user->getLogin());
        $this->assertInstanceOf(User::class, $this->user->setLogin($login));
        $this->assertEquals($login, $this->user->getLogin());
    }

    /**
     *
     */
    public function testGetSetEmail()
    {
        $email = $this->faker->email();
        $this->assertNull($this->user->getEmail());
        $this->assertFalse($this->user->hasEmail());
        $this->assertInstanceOf(User::class, $this->user->setEmail(null));
        $this->assertNull($this->user->getEmail());
        $this->assertFalse($this->user->hasEmail());
        $this->assertInstanceOf(User::class, $this->user->setEmail($email));
        $this->assertEquals($email, $this->user->getEmail());
        $this->assertTrue($this->user->hasEmail());
    }

    /**
     * @throws Exception
     */
    public function testGetSetDisplayName()
    {
        $displayName = u($this->faker->userName())->title()->toString();
        $this->assertEmpty($this->user->getDisplayName());
        $this->assertInstanceOf(User::class, $this->user->setDisplayName(null));
        $this->assertEmpty($this->user->getDisplayName());
        $this->assertInstanceOf(User::class, $this->user->setDisplayName($displayName));
        $this->assertEquals($displayName, $this->user->getDisplayName());
    }

    /**
     *
     */
    public function testGetSetProfileImageUrl()
    {
        $profileImageUrl = $this->faker->imageUrl();
        $this->assertNull($this->user->getProfileImageUrl());
        $this->assertInstanceOf(User::class, $this->user->setProfileImageUrl(null));
        $this->assertNull($this->user->getProfileImageUrl());
        $this->assertInstanceOf(User::class, $this->user->setProfileImageUrl($profileImageUrl));
        $this->assertEquals($profileImageUrl, $this->user->getProfileImageUrl());
    }

    /**
     *
     */
    public function testGetSetBroadcasterType()
    {
        $broadcasterType = $this->faker->randomElement(["partner", "affiliate", ""]);
        $this->assertNull($this->user->getBroadcasterType());
        $this->assertInstanceOf(User::class, $this->user->setBroadcasterType(null));
        $this->assertNull($this->user->getBroadcasterType());
        $this->assertInstanceOf(User::class, $this->user->setBroadcasterType($broadcasterType));
        $this->assertEquals($broadcasterType, $this->user->getBroadcasterType());
    }

    /**
     *
     */
    public function testGetSetOfflineImageUrl()
    {
        $offlineImageUrl = $this->faker->imageUrl();
        $this->assertNull($this->user->getOfflineImageUrl());
        $this->assertInstanceOf(User::class, $this->user->setOfflineImageUrl(null));
        $this->assertNull($this->user->getOfflineImageUrl());
        $this->assertInstanceOf(User::class, $this->user->setOfflineImageUrl($offlineImageUrl));
        $this->assertEquals($offlineImageUrl, $this->user->getOfflineImageUrl());
    }

    /**
     *
     */
    public function testGetSetDescription()
    {
        $description = $this->faker->paragraph();
        $this->assertNull($this->user->getDescription());
        $this->assertInstanceOf(User::class, $this->user->setDescription(null));
        $this->assertNull($this->user->getDescription());
        $this->assertInstanceOf(User::class, $this->user->setDescription($description));
        $this->assertEquals($description, $this->user->getDescription());
    }

    /**
     * @return \Generator
     * @throws Exception
     */
    public function provideUserArgsForMake()
    {
        $this->setupFaker();

        yield ['id' => (string) $this->faker->numberBetween(1000, 9999999), 'login' => null, 'broadcasterType' => null, 'description' => null, 'displayName' => null, 'email' => null, 'offlineImageUrl' => null, 'profileImageUrl' => null, 'type' => null, 'viewCount' => null];
        yield ['id' => (string) $this->faker->numberBetween(1000, 9999999), 'login' => '', 'broadcasterType' => null, 'description' => null, 'displayName' => null, 'email' => null, 'offlineImageUrl' => null, 'profileImageUrl' => null, 'type' => null, 'viewCount' => null];
        yield ['id' => (string) $this->faker->numberBetween(1000, 9999999), 'login' => $this->faker->userName(), 'broadcasterType' => null, 'description' => null, 'displayName' => null, 'email' => null, 'offlineImageUrl' => null, 'profileImageUrl' => null, 'type' => null, 'viewCount' => null];

        foreach(range(1, 10) as $i) {
            $login = $this->faker->userName();
            yield ['id' => (string)$this->faker->numberBetween(1000, 9999999), 'login' => $login, 'broadcasterType' => $this->faker->optional()->randomElement(['partner', 'affiliate', '']), 'description' => $this->faker->optional()->paragraph(), 'displayName' => $this->faker->optional()->passthrough($login), 'email' => $this->faker->optional()->email(), 'offlineImageUrl' => $this->faker->optional()->imageUrl(), 'profileImageUrl' => $this->faker->optional()->imageUrl(), 'type' => $this->faker->optional()->randomElement(['staff', 'admin', 'global_mod', '']), 'viewCount' => $this->faker->optional()->numberBetween()];
        }
    }

    /**
     * @dataProvider provideUserArgsForMake
     * @param $id
     * @param $login
     * @param $broadcasterType
     * @param $description
     * @param $displayName
     * @param $email
     * @param $offlineImageUrl
     * @param $profileImageUrl
     * @param $type
     * @param $viewCount
     */
    public function testCreate($id, $login, $broadcasterType, $description, $displayName, $email, $offlineImageUrl, $profileImageUrl, $type, $viewCount)
    {
        $user = User::make($id, $login, $broadcasterType, $description, $displayName, $email, $offlineImageUrl, $profileImageUrl, $type, $viewCount);
        $this->assertInstanceOf(User::class, $user);
        $this->assertInstanceOf(UserInterface::class, $user);

        $this->assertEquals($id, $user->getId());
        if(empty($login)) {
            $this->assertEmpty($user->getLogin());
        } else {
            $this->assertEquals($login, $user->getLogin());
        }
    }
}
