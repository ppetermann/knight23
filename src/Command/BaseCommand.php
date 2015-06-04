<?php
namespace Knight23\Core\Command;

use Knight23\Core\Colors\Colors;

abstract class BaseCommand implements CommandInterface
{
    protected $name = "";
    protected $short = "";

    protected $options = [];
    protected $arguments = [];

    /**
     * @param string $name
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function addOption($optionName, $default, $help = "")
    {
        $this->options[] = ['name' => $optionName, 'default' => $default, 'help' => $help];
    }

    protected function addArgument($argumentName, $default, $help = "")
    {
        $this->arguments[] = ['name' => $argumentName, 'default' => $default, 'help' => $help];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getShort()
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    public function getHelp()
    {
        $help = "";
        if (count($this->options) > 0) {
            $help .= "\n        ".Colors::FONT_BOLD."Options:".Colors::RESET."\n";
            foreach ($this->options as $option) {
                $help .= "          --".$option['name'].'=['.$option['default'].'] '
                    .Colors::COLOR_FG_LIGHTGRAY.$option['help'].Colors::RESET." \n";
            }
        }

        if (count($this->arguments) > 0) {
            $help .= "\n        ".Colors::FONT_BOLD."Arguments:".Colors::RESET."\n";
            foreach ($this->arguments as $argument) {
                $help .= "          ".$argument['name']."\t"
                    .Colors::COLOR_FG_LIGHTGRAY.$argument['help'].Colors::RESET." \n";
            }
        }

        return $help;
    }

    abstract public function run(array $options, array $arguments);
}
