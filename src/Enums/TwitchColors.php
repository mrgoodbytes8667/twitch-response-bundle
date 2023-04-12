<?php


namespace Bytes\TwitchResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\BackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\BackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * @since 0.1.3
 */
enum TwitchColors: int implements BackedEnumInterface
{
    use BackedEnumTrait;

    /**
     * Main purple
     * #9146FF
     */
    case PRIMARY_TWITCH_PURPLE = 0x9146FF;

    /**
     * #000000
     */
    case PRIMARY_BLACK_OPS = 0x000000;

    /**
     * Ice is both a primary and muted color
     * #F0F0FF
     */
    case MUTED_ICE = 0xF0F0FF;

    /**
     * #FAB4FF
     */
    case MUTED_JIGGLE = 0xFAB4FF;

    /**
     * #FACDCD
     */
    case MUTED_WORM = 0xFACDCD;

    /**
     * #FEEE85
     */
    case MUTED_ISABELLE = 0xFEEE85;

    /**
     * #BEFAE1
     */
    case MUTED_DROID = 0xBEFAE1;

    /**
     * #00C8AF
     */
    case MUTED_WIPE_OUT = 0x00C8AF;

    /**
     * #D2D2E6
     */
    case MUTED_SMOKE = 0xD2D2E6;

    /**
     * #BFABFF
     */
    case MUTED_WIDOW = 0xBFABFF;

    /**
     * #FC6675
     */
    case MUTED_PEACH = 0xFC6675;

    /**
     * #FFCA5F
     */
    case MUTED_PACMAN = 0xFFCA5F;

    /**
     * #57BEE6
     */
    case MUTED_FELICIA = 0x57BEE6;

    /**
     * #0014A5
     */
    case MUTED_SONIC = 0x0014A5;

    /**
     * #8205B4
     */
    case ACCENT_DRAGON = 0x8205B4;

    /**
     * #FA1ED2
     */
    case ACCENT_CUDDLE = 0xFA1ED2;

    /**
     * #FF6905
     */
    case ACCENT_BANDIT = 0xFF6905;

    /**
     * #FAFA19
     */
    case ACCENT_LIGHTNING = 0xFAFA19;

    /**
     * #BEFF00
     */
    case ACCENT_KO = 0xBEFF00;

    /**
     * #00FAFA
     */
    case ACCENT_MEGA = 0x00FAFA;

    /**
     * #41145F
     */
    case ACCENT_NIGHTS = 0x41145F;

    /**
     * #BE0078
     */
    case ACCENT_OSU = 0xBE0078;

    /**
     * #FA2828
     */
    case ACCENT_SNIPER = 0xFA2828;

    /**
     * #00FA05
     */
    case ACCENT_EGG = 0x00FA05;

    /**
     * #69FFC3
     */
    case ACCENT_LEGEND = 0x69FFC3;

    /**
     * #1E69FF
     */
    case ACCENT_ZERO = 0x1E69FF;

    /**
     * Returns the three primary colors
     * @return TwitchColors[]
     */
    public static function primary()
    {
        return [
            TwitchColors::PRIMARY_TWITCH_PURPLE,
            TwitchColors::PRIMARY_BLACK_OPS,
            TwitchColors::MUTED_ICE,
        ];
    }

    /**
     * Returns the twelve muted colors
     * @return TwitchColors[]
     */
    public static function muted()
    {
        return [
            TwitchColors::MUTED_ICE,
            TwitchColors::MUTED_JIGGLE,
            TwitchColors::MUTED_WORM,
            TwitchColors::MUTED_ISABELLE,
            TwitchColors::MUTED_DROID,
            TwitchColors::MUTED_WIPE_OUT,
            TwitchColors::MUTED_SMOKE,
            TwitchColors::MUTED_WIDOW,
            TwitchColors::MUTED_PEACH,
            TwitchColors::MUTED_PACMAN,
            TwitchColors::MUTED_FELICIA,
            TwitchColors::MUTED_SONIC,

        ];
    }

    /**
     * Returns the twelve accent colors
     * @return TwitchColors[]
     */
    public static function accent()
    {
        return [
            TwitchColors::ACCENT_DRAGON,
            TwitchColors::ACCENT_CUDDLE,
            TwitchColors::ACCENT_BANDIT,
            TwitchColors::ACCENT_LIGHTNING,
            TwitchColors::ACCENT_KO,
            TwitchColors::ACCENT_MEGA,
            TwitchColors::ACCENT_NIGHTS,
            TwitchColors::ACCENT_OSU,
            TwitchColors::ACCENT_SNIPER,
            TwitchColors::ACCENT_EGG,
            TwitchColors::ACCENT_LEGEND,
            TwitchColors::ACCENT_ZERO,
        ];
    }


    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::PRIMARY_TWITCH_PURPLE')]
    public static function primaryTwitchPurple(): TwitchColors
    {
        return TwitchColors::PRIMARY_TWITCH_PURPLE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::PRIMARY_BLACK_OPS')]
    public static function primaryBlackOps(): TwitchColors
    {
        return TwitchColors::PRIMARY_BLACK_OPS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_ICE')]
    public static function mutedIce(): TwitchColors
    {
        return TwitchColors::MUTED_ICE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_JIGGLE')]
    public static function mutedJiggle(): TwitchColors
    {
        return TwitchColors::MUTED_JIGGLE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_WORM')]
    public static function mutedWorm(): TwitchColors
    {
        return TwitchColors::MUTED_WORM;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_ISABELLE')]
    public static function mutedIsabelle(): TwitchColors
    {
        return TwitchColors::MUTED_ISABELLE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_DROID')]
    public static function mutedDroid(): TwitchColors
    {
        return TwitchColors::MUTED_DROID;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_WIPE_OUT')]
    public static function mutedWipeOut(): TwitchColors
    {
        return TwitchColors::MUTED_WIPE_OUT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_SMOKE')]
    public static function mutedSmoke(): TwitchColors
    {
        return TwitchColors::MUTED_SMOKE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_WIDOW')]
    public static function mutedWidow(): TwitchColors
    {
        return TwitchColors::MUTED_WIDOW;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_PEACH')]
    public static function mutedPeach(): TwitchColors
    {
        return TwitchColors::MUTED_PEACH;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_PACMAN')]
    public static function mutedPacman(): TwitchColors
    {
        return TwitchColors::MUTED_PACMAN;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_FELICIA')]
    public static function mutedFelicia(): TwitchColors
    {
        return TwitchColors::MUTED_FELICIA;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::MUTED_SONIC')]
    public static function mutedSonic(): TwitchColors
    {
        return TwitchColors::MUTED_SONIC;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_DRAGON')]
    public static function accentDragon(): TwitchColors
    {
        return TwitchColors::ACCENT_DRAGON;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_CUDDLE')]
    public static function accentCuddle(): TwitchColors
    {
        return TwitchColors::ACCENT_CUDDLE;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_BANDIT')]
    public static function accentBandit(): TwitchColors
    {
        return TwitchColors::ACCENT_BANDIT;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_LIGHTNING')]
    public static function accentLightning(): TwitchColors
    {
        return TwitchColors::ACCENT_LIGHTNING;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_KO')]
    public static function accentKo(): TwitchColors
    {
        return TwitchColors::ACCENT_KO;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_MEGA')]
    public static function accentMega(): TwitchColors
    {
        return TwitchColors::ACCENT_MEGA;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_NIGHTS')]
    public static function accentNights(): TwitchColors
    {
        return TwitchColors::ACCENT_NIGHTS;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_OSU')]
    public static function accentOsu(): TwitchColors
    {
        return TwitchColors::ACCENT_OSU;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_SNIPER')]
    public static function accentSniper(): TwitchColors
    {
        return TwitchColors::ACCENT_SNIPER;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_EGG')]
    public static function accentEgg(): TwitchColors
    {
        return TwitchColors::ACCENT_EGG;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_LEGEND')]
    public static function accentLegend(): TwitchColors
    {
        return TwitchColors::ACCENT_LEGEND;
    }

    #[Deprecated('Since 0.6.1, use the enum variant', '%class%::ACCENT_ZERO')]
    public static function accentZero(): TwitchColors
    {
        return TwitchColors::ACCENT_ZERO;
    }
}
