<?php
namespace Knight23\Core\Command;

interface CommandInterface
{
    public function getHelp();
    public function getShort();
    public function run(array $options, array $arguments);
}