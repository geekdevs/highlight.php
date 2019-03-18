<?php
namespace Highlight\Colors\Cli;

/**
 * Class CliColors
 * @package Highlight\Decorator
 */
class Colors
{
    public const RESET         = "\e[0m";
    public const WHITE         = "\e[0m";
    public const NORMAL        = "\e[0m";
    public const RED           = "\033[0;31m";
    public const BG_WHITE      = "\e[107m";
    public const BLUE          = "\033[0;34m";
    public const CYAN          = "\033[0;36m";
    public const BG_RED        = "\033[41m";
    public const BLACK         = "\033[0;30m";
    public const GREEN         = "\033[0;32m";
    public const GRAY          = "\033[0;90m";
    public const BROWN         = "\033[0;33m";
    public const BG_BLUE       = "\033[44m";
    public const BG_CYAN       = "\033[46m";
    public const PURPLE        = "\033[0;35m";
    public const MAGENTA       = "\033[0;35m";
    public const BG_BLACK      = "\033[40m";
    public const BG_GREEN      = "\033[42m";
    public const YELLOW        = "\033[0;33m";
    public const BG_YELLOW     = "\033[43m";
    public const BG_MAGENTA    = "\033[45m";
    public const DARK_GRAY     = "\033[1;30m";
    public const LIGHT_RED     = "\033[1;31m";
    public const LIGHT_BLUE    = "\033[1;34m";
    public const LIGHT_CYAN    = "\033[1;36m";
    public const LIGHT_GRAY    = "\033[0;37m";
    public const BOLD_WHITE    = "\033[1;38m";
    public const LIGHT_GREEN   = "\033[1;32m";
    public const LIGHT_WHITE   = "\033[1;38m";
    public const BG_LIGHT_GRAY = "\033[47m";
    public const LIGHT_PURPLE  = "\033[1;35m";
    public const LIGHT_YELLOW  = "\033[1;93m";
    public const LIGHT_MAGENTA = "\033[1;35m";


    /**
     * Converts user-friendly color name to CLI color code
     *
     * @param string $colorName
     *
     * @return string
     */
    public static function normalizeColor(string $colorName): string
    {
        $colorName = strtoupper($colorName);

        if (!defined(Colors::class.'::'.$colorName)) {
            throw new \RuntimeException(sprintf(
                'Unsupported color %s, for list of supported colors check constants at %s.',
                $colorName,
                Colors::class
            ));
        }

        return constant(Colors::class.'::'.$colorName);
    }
}
