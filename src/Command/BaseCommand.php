<?php
namespace Knight23\Core\Command;

use Knight23\Core\Colors\Colors;

abstract class BaseCommand implements CommandInterface
{
    /**
     * @var string
     */
    protected $name = "";

    /**
     * @var string
     */
    protected $short = "";

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * @param string $name
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $optionName
     * @param string $default
     * @param string $help
     */
    protected function addOption($optionName, $default, $help = "")
    {
        $this->options[] = ['name' => $optionName, 'default' => $default, 'help' => $help];
    }

    /**
     * @param string $argumentName
     * @param string $default
     * @param string $help
     */
    protected function addArgument($argumentName, $default, $help = "")
    {
        $this->arguments[] = ['name' => $argumentName, 'default' => $default, 'help' => $help];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
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

    /**
     * @return string
     */
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

    /**
     * @param array $options
     * @param array $arguments
     * @return mixed
     */
    abstract public function run(array $options, array $arguments);
}
