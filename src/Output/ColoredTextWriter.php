<?php
namespace Knight23\Core\Output;

use Knight23\Core\Colors\SimpleReplaceThemeInterface;

class ColoredTextWriter extends SimpleTextWriter implements WriterInterface
{
    /**
     * @var \Knight23\Core\Colors\SimpleReplaceThemeInterface
     */
    private $theme =[];

    public function __construct(SimpleReplaceThemeInterface $theme)
    {
        $this->theme = $theme->getReplaces();
    }

    public function write($characters)
    {
        parent::write(strtr($characters, $this->theme));
    }
}
