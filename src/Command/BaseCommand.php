<?php
namespace Knight23\Core\Command;

use Knight23\Core\Output\Colors;

abstract class BaseCommand implements CommandInterface
{
    protected $name;
    protected $options = [];
    protected $arguments = [];

    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function addOption($optionName, $default)
    {
        $this->options[] = ['name' => $optionName, 'default' => $default, 'help' => ""];
    }

    protected function addArgument($argumentName, $default)
    {
        $this->arguments[] = ['name' => $argumentName, 'default' => $default, 'help' => ""];
    }

    public function getShort()
    {
        return $this->name;
    }

    public function getHelp()
    {
        $help = Colors::COLOR_FG_LIGHTGRAY.$this->name.Colors::RESET;
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
                $help .= "          ".$argument['name']
                    .Colors::COLOR_FG_LIGHTGRAY.$argument['help'].Colors::RESET." \n";
            }
        }
        return $help;
    }

    abstract public function run(array $options, array $arguments);
}
