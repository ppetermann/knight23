<?php
namespace Knight23\Core;

interface RunnerInterface
{
    /**
     * @return void
     */
    public function addCommand($command);

    /**
     * @return Command\CommandInterface[]
     */
    public function getCommands();

    /**
     * @param int $argc
     * @param string[] $argv
     */
    public function run($argc, $argv);
}
