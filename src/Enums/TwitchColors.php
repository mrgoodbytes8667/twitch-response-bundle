<?php


namespace Bytes\TwitchResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class TwitchColors
 * @package Bytes\TwitchResponseBundle\Enums
 *
 * @method static self primaryTwitchPurple() #9146FF Main purple
 * @method static self primaryBlackOps() #000000
 * @method static self mutedIce() #F0F0FF Ice is both a primary and muted color
 * @method static self mutedJiggle() #FAB4FF
 * @method static self mutedWorm() #FACDCD
 * @method static self mutedIsabelle() #FEEE85
 * @method static self mutedDroid() #BEFAE1
 * @method static self mutedWipeOut() #00C8AF
 * @method static self mutedSmoke() #D2D2E6
 * @method static self mutedWidow() #BFABFF
 * @method static self mutedPeach() #FC6675
 * @method static self mutedPacman() #FFCA5F
 * @method static self mutedFelicia() #57BEE6
 * @method static self mutedSonic() #0014A5
 * @method static self accentDragon() #8205B4
 * @method static self accentCuddle() #FA1ED2
 * @method static self accentBandit() #FF6905
 * @method static self accentLightning() #FAFA19
 * @method static self accentKo() #BEFF00
 * @method static self accentMega() #00FAFA
 * @method static self accentNights() #41145F
 * @method static self accentOsu() #BE0078
 * @method static self accentSniper() #FA2828
 * @method static self accentEgg() #00FA05
 * @method static self accentLegend() #69FFC3
 * @method static self accentZero() #1E69FF
 *
 * @since 0.1.3
 *
 */
class TwitchColors extends Enum
{
    /**
     * Main purple
     * #9146FF
     */
    const PRIMARY_TWITCH_PURPLE = 0x9146FF;

    /**
     * #000000
     */
    const PRIMARY_BLACK_OPS = 0x000000;

    /**
     * Ice is both a primary and muted color
     * #F0F0FF
     */
    const MUTED_ICE = 0xF0F0FF;

    /**
     * #FAB4FF
     */
    const MUTED_JIGGLE = 0xFAB4FF;

    /**
     * #FACDCD
     */
    const MUTED_WORM = 0xFACDCD;

    /**
     * #FEEE85
     */
    const MUTED_ISABELLE = 0xFEEE85;

    /**
     * #BEFAE1
     */
    const MUTED_DROID = 0xBEFAE1;

    /**
     * #00C8AF
     */
    const MUTED_WIPE_OUT = 0x00C8AF;

    /**
     * #D2D2E6
     */
    const MUTED_SMOKE = 0xD2D2E6;

    /**
     * #BFABFF
     */
    const MUTED_WIDOW = 0xBFABFF;

    /**
     * #FC6675
     */
    const MUTED_PEACH = 0xFC6675;

    /**
     * #FFCA5F
     */
    const MUTED_PACMAN = 0xFFCA5F;

    /**
     * #57BEE6
     */
    const MUTED_FELICIA = 0x57BEE6;

    /**
     * #0014A5
     */
    const MUTED_SONIC = 0x0014A5;

    /**
     * #8205B4
     */
    const ACCENT_DRAGON = 0x8205B4;

    /**
     * #FA1ED2
     */
    const ACCENT_CUDDLE = 0xFA1ED2;

    /**
     * #FF6905
     */
    const ACCENT_BANDIT = 0xFF6905;

    /**
     * #FAFA19
     */
    const ACCENT_LIGHTNING = 0xFAFA19;

    /**
     * #BEFF00
     */
    const ACCENT_KO = 0xBEFF00;

    /**
     * #00FAFA
     */
    const ACCENT_MEGA = 0x00FAFA;

    /**
     * #41145F
     */
    const ACCENT_NIGHTS = 0x41145F;

    /**
     * #BE0078
     */
    const ACCENT_OSU = 0xBE0078;

    /**
     * #FA2828
     */
    const ACCENT_SNIPER = 0xFA2828;

    /**
     * #00FA05
     */
    const ACCENT_EGG = 0x00FA05;

    /**
     * #69FFC3
     */
    const ACCENT_LEGEND = 0x69FFC3;

    /**
     * #1E69FF
     */
    const ACCENT_ZERO = 0x1E69FF;

    /**
     * Returns the three primary colors
     * @return TwitchColors[]
     */
    public static function primary()
    {
        return [
            static::primaryTwitchPurple(),
            static::primaryBlackOps(),
            static::mutedIce(),
        ];
    }

    /**
     * Returns the twelve muted colors
     * @return TwitchColors[]
     */
    public static function muted()
    {
        return [
            static::mutedIce(),
            static::mutedJiggle(),
            static::mutedWorm(),
            static::mutedIsabelle(),
            static::mutedDroid(),
            static::mutedWipeOut(),
            static::mutedSmoke(),
            static::mutedWidow(),
            static::mutedPeach(),
            static::mutedPacman(),
            static::mutedFelicia(),
            static::mutedSonic(),

        ];
    }

    /**
     * Returns the twelve accent colors
     * @return TwitchColors[]
     */
    public static function accent()
    {
        return [
            static::accentDragon(),
            static::accentCuddle(),
            static::accentBandit(),
            static::accentLightning(),
            static::accentKo(),
            static::accentMega(),
            static::accentNights(),
            static::accentOsu(),
            static::accentSniper(),
            static::accentEgg(),
            static::accentLegend(),
            static::accentZero(),
        ];
    }

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            'primaryTwitchPurple' => static::PRIMARY_TWITCH_PURPLE,
            'primaryBlackOps' => static::PRIMARY_BLACK_OPS,
            'mutedIce' => static::MUTED_ICE,
            'mutedJiggle' => static::MUTED_JIGGLE,
            'mutedWorm' => static::MUTED_WORM,
            'mutedIsabelle' => static::MUTED_ISABELLE,
            'mutedDroid' => static::MUTED_DROID,
            'mutedWipeOut' => static::MUTED_WIPE_OUT,
            'mutedSmoke' => static::MUTED_SMOKE,
            'mutedWidow' => static::MUTED_WIDOW,
            'mutedPeach' => static::MUTED_PEACH,
            'mutedPacman' => static::MUTED_PACMAN,
            'mutedFelicia' => static::MUTED_FELICIA,
            'mutedSonic' => static::MUTED_SONIC,
            'accentDragon' => static::ACCENT_DRAGON,
            'accentCuddle' => static::ACCENT_CUDDLE,
            'accentBandit' => static::ACCENT_BANDIT,
            'accentLightning' => static::ACCENT_LIGHTNING,
            'accentKo' => static::ACCENT_KO,
            'accentMega' => static::ACCENT_MEGA,
            'accentNights' => static::ACCENT_NIGHTS,
            'accentOsu' => static::ACCENT_OSU,
            'accentSniper' => static::ACCENT_SNIPER,
            'accentEgg' => static::ACCENT_EGG,
            'accentLegend' => static::ACCENT_LEGEND,
            'accentZero' => static::ACCENT_ZERO,
        ];
    }
}