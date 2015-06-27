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
     * @return void|int
     */
    public function run($argc, $argv);

    /**
     * @return string
     */
    public function getPackageName();

    /**
     * @return string
     */
    public function getVersion();

    /**
     * @return string
     */
    public function getPharName();
}
