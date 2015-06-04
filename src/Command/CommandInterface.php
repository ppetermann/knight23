<?php
namespace Knight23\Core\Command;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getHelp();

    /**
     * @return string
     */
    public function getShort();

    /**
     * @return string
     */
    public function getName();
    public function run(array $options, array $arguments);
}
