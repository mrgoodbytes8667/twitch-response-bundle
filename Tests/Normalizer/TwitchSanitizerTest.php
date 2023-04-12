<?php

namespace Bytes\TwitchResponseBundle\Tests\Normalizer;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchSanitizer;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;
use function Symfony\Component\String\u;

/**
 * Class TwitchSanitizerTest
 * @package Bytes\TwitchResponseBundle\Tests\Normalizer
 */
class TwitchSanitizerTest extends TestCase
{
    use TestFakerTrait;

    /**
     * @return Generator
     */
    public static function provideUsernames()
    {
        yield ['input' => '    SFlkjhdfSDSd9dflkjgh&34`   q ', 'output' => 'sflkjhdfsdsd9dflkjgh34q'];
        yield ['input' => '⪗⍋⮣ₛ⁨⊑↫⌋⳥⿯➩⥓⚛➙ⴎ⿛⤟⬻Ⰾ⟞⛼⚇⥙⩘◊₲ℂ↑aAa④⢸⿻⟃⻏ⶤ⩡Ⓟ⦙ⓞ⟠⋷ⓐ⥗≹↧⽇⽿␔⩟⺺ⴰ❈ⷎ⓪⠅⿾⩂␱ Ⱝ⽝⅟≭⦠⬽⤺⣟⓽⧩ⵈ⟆–⫹⩉ⲡ␪≆⡍₃⒈⩧⽵☏⤧√↞⽫⨡❗⊑⨲⼢⒄⌥⡓⢒⩓⥬⧐⤚⛒≾', 'output' => 'aaa'];
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideFakerUsernames()
    {
        $this->setupFaker();

        foreach (range(1, 500) as $index) {
            $username = $this->faker->userName();
            yield ['input' => $username, 'output' => u($username)->replace('.', '')->trim()->lower()->toString()];
        }
    }

    /**
     * @dataProvider provideUsernames
     * @dataProvider provideFakerUsernames
     * @param $input
     * @param $output
     */
    public function testLogin($input, $output)
    {
        $this->assertEquals($output, TwitchSanitizer::login($input));
    }
}