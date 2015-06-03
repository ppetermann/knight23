<?php
namespace Knight23\Core\Colors;

class SimpleReplaceTheme implements SimpleReplaceThemeInterface
{

    /**
     * very simple color scheme to be used through replaces
     * @return array
     */
    public function getReplaces()
    {
        return [
            "<header>" => Colors::COLOR_FGL_WHITE . Colors::FONT_BOLD,
            "</header>" => Colors::RESET,

            "<highlight>" => Colors::COLOR_FGL_YELLOW . Colors::FONT_BOLD,
            "</highlight>" => Colors::RESET,

            "<warn>" => Colors::COLOR_FG_RED,
            "</warn>" => Colors::RESET,

            "<info>" => Colors::COLOR_FGL_BLUE,
            "</info>" => Colors::RESET,

            "<error>" => Colors::COLOR_BG_RED . Colors::COLOR_FGL_WHITE,
            "</error>" => Colors::RESET
        ];
    }
}