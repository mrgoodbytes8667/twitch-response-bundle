<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\TwitchResponseBundle\Objects\Users\User;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;

class DeserializationTest extends TestSerializationCase
{
    public function testUserDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('users.json')), User::class, 'json', [UnwrappingDenormalizer::UNWRAP_PATH => '[data][0]']);

        $this->assertEquals($output->getBroadcasterType(), 'partner');
        $this->assertEquals($output->getDescription(), "Twitch is the world's leading video platform and community for gamers with more than 100 million visitors per month. Our mission is to connect gamers around the world by allowing them to broadcast, watch, and chat from everywhere they play.");
        $this->assertEquals($output->getDisplayName(), "Twitch");
        $this->assertEquals($output->getId(), "12826");
        $this->assertEquals($output->getLogin(), "twitch");
        $this->assertEquals($output->getOfflineImageUrl(), "https://static-cdn.jtvnw.net/jtv_user_pictures/bdc19970-3a3b-4516-9f23-4203d59f0a5d-channel_offline_image-1920x1080.png");
        $this->assertEquals($output->getProfileImageUrl(), "https://static-cdn.jtvnw.net/jtv_user_pictures/27bfa19d-e9ab-4d31-bff5-eea89e47a3df-profile_image-300x300.png");
        $this->assertEquals($output->getType(), "");
        $this->assertEquals($output->getViewCount(), 312119199);
        $this->assertNull($output->getEmail());
    }
}