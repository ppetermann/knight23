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
     * @return void
     */
    public function run();
}
