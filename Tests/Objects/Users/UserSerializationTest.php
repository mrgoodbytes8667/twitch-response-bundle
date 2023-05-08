<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Users;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Objects\Interfaces\UserInterface;
use Bytes\TwitchResponseBundle\Objects\Users\User;
use Bytes\TwitchResponseBundle\Tests\TestFullSerializationCase;
use DateTime;
use DateTimeInterface;
use Exception;
use Generator;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use function Symfony\Component\String\u;

/**
 *
 */
class UserSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testUserDeserialization()
    {
        /** @var User $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('users.json')), User::class, 'json', [UnwrappingDenormalizer::UNWRAP_PATH => '[data][0]']);

        self::assertEquals('partner', $output->getBroadcasterType());
        self::assertEquals("Twitch is the world's leading video platform and community for gamers with more than 100 million visitors per month. Our mission is to connect gamers around the world by allowing them to broadcast, watch, and chat from everywhere they play.", $output->getDescription());
        self::assertEquals("Twitch", $output->getDisplayName());
        self::assertEquals($output->getDisplayName(), $output->getUserName());
        self::assertEquals("12826", $output->getUserId());
        self::assertEquals("twitch", $output->getLogin());
        self::assertEquals($output->getLogin(), $output->getUserLogin());
        self::assertEquals("https://static-cdn.jtvnw.net/jtv_user_pictures/bdc19970-3a3b-4516-9f23-4203d59f0a5d-channel_offline_image-1920x1080.png", $output->getOfflineImageUrl());
        self::assertEquals("https://static-cdn.jtvnw.net/jtv_user_pictures/27bfa19d-e9ab-4d31-bff5-eea89e47a3df-profile_image-300x300.png", $output->getProfileImageUrl());
        self::assertEquals("https://static-cdn.jtvnw.net/jtv_user_pictures/27bfa19d-e9ab-4d31-bff5-eea89e47a3df-profile_image-300x300.png", $output->getProfileImage());
        self::assertEquals("", $output->getType());
        self::assertEquals(312119199, $output->getViewCount());
        self::assertNull($output->getEmail());
        self::assertEquals($output->getCreatedAt(), new DateTime('2007-05-22T10:39:54.000000+0000'));
    }
}
