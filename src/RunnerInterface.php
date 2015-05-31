<?php
namespace Knight23\Core;

interface RunnerInterface
{
    public function addCommand($command);
    public function getCommands();
    public function run();
}
