<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription;

use Bytes\Common\Faker\Providers\MiscProvider;
use Bytes\Common\Faker\Providers\Twitch;
use Bytes\Common\Faker\TestFakerTrait;
use Bytes\Common\Faker\Twitch\TestTwitchFakerTrait;
use Bytes\TwitchResponseBundle\Enums\EventSubSubscriptionTypes;
use Bytes\TwitchResponseBundle\Enums\EventSubTransportMethod;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Create;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Transport;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Address;
use Faker\Provider\Barcode;
use Faker\Provider\Biased;
use Faker\Provider\Color;
use Faker\Provider\Company;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Medical;
use Faker\Provider\Miscellaneous;
use Faker\Provider\Payment;
use Faker\Provider\Person;
use Faker\Provider\PhoneNumber;
use Faker\Provider\Text;
use Faker\Provider\UserAgent;
use Faker\Provider\Uuid;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class CreateTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\EventSub\Subscription
 *
 * @property FakerGenerator|MiscProvider|Twitch|FakerEnumProvider|Address|Barcode|Biased|Color|Company|DateTime|File|HtmlLorem|Image|Internet|Lorem|Medical|Miscellaneous|Payment|Person|PhoneNumber|Text|UserAgent|Uuid $faker
 */
class CreateTest extends TestCase
{
    use EnumAssertions, TestTwitchFakerTrait {
        TestTwitchFakerTrait::getProviders as parentProviders;
    }

    /**
     * @return array
     */
    protected function getProviders()
    {
        return array_merge($this->parentProviders(), [FakerEnumProvider::class]);
    }


    /**
     * @dataProvider provideValidCreates
     * @param $type
     * @param $conditions
     * @param $callback
     * @param $secret
     * @param $method
     */
    public function testCreate($type, $conditions, $callback, $secret, $method)
    {
        $create = Create::create($type, $conditions, $callback, $secret, $method);
        $this->assertInstanceOf(Create::class, $create);

        $this->assertSameEnumValue($type, $create->getType());
        $this->assertInstanceOf(Transport::class, $create->getTransport());

        $this->assertEquals($callback, $create->getTransport()?->getCallback());
        $this->assertEquals($secret, $create->getTransport()?->getSecret());
        $this->assertEquals($method ?? Transport::DEFAULT_METHOD, $create->getTransport()?->getMethod());
    }

    /**
     *
     */
    public function testCreateFail()
    {
        $this->expectException(\InvalidArgumentException::class);

        $type = $this->faker->randomEnum(EventSubSubscriptionTypes::class);
        $conditions = new \DateTime();
        $callback = $this->faker->url();
        $secret = $this->faker->accessToken();
        $method = $this->faker->optional()->randomEnum(EventSubTransportMethod::class);

        $create = Create::create($type, $conditions, $callback, $secret, $method);
    }

    /**
     * @return \Generator
     */
    public function provideValidCreates()
    {
        $this->setupFaker();

        $conditions = ['broadcasterUserId' => $this->faker->id()];

        yield ['type' => $this->faker->randomEnum(EventSubSubscriptionTypes::class), 'conditions' => $conditions, 'callback' => $this->faker->url(), 'secret' => $this->faker->accessToken(), 'method' => $this->faker->optional()->randomEnum(EventSubTransportMethod::class)];
        
        $conditions = Condition::createFromArray(['broadcasterUserId' => $this->faker->id()]);

        yield ['type' => $this->faker->randomEnum(EventSubSubscriptionTypes::class), 'conditions' => $conditions, 'callback' => $this->faker->url(), 'secret' => $this->faker->accessToken(), 'method' => $this->faker->optional()->randomEnum(EventSubTransportMethod::class)];

        $conditions = new Condition();
        $conditions->setBroadcasterUserId($this->faker->id());

        yield ['type' => $this->faker->randomEnum(EventSubSubscriptionTypes::class), 'conditions' => $conditions, 'callback' => $this->faker->url(), 'secret' => $this->faker->accessToken(), 'method' => $this->faker->optional()->randomEnum(EventSubTransportMethod::class)];
    }
}

