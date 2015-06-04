<?php
namespace Knight23\Core;

use King23\DI\ContainerInterface;
use Knight23\Core\Command\CommandInterface;
use React\EventLoop\LoopInterface;

class Knight23 implements RunnerInterface
{
    /**
     * the version of this Knight23 Package
     */
    const VERSION = "0.0.0";

    /**
     * @var CommandInterface[]
     */
    protected $commands = [];

    /**
     * @var LoopInterface
     */
    protected $loop;
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param LoopInterface $loop
     * @param ContainerInterface $container
     */
    public function __construct(
        LoopInterface $loop,
        ContainerInterface $container
    ) {
        $this->loop = $loop;
        $this->container = $container;
    }

    /**
     * add a command
     * @var string $command command::class
     */
    public function addCommand($command)
    {
        $this->commands[] = $this->container->getInstanceOf($command);
    }



    /**
     * execute the actuall run
     */
    public function run($argc, $argv)
    {
        $this->addDefaultCommands();

        // @todo place better command parser here
        if ($argc == 1) {
            $run = $this->getDefaultCommand();
            $argv = [];
        } else {
            $run = $argv[1];
            $argv = array_slice($argv, 2);
        }


        $found = false;

        /** @var CommandInterface $command */
        foreach ($this->commands as $command) {
            // @todo prevent multiple commands having the same name (why?)
            if ($command->getName() == $run)
            {
                $command->run([], $argv);
                $found = true;
            }
        }

        // @todo more gracefull end
        if (!$found) {
            echo "command unknown\n";
            // exit with error
            exit(1);
        }

        // stuff
        $this->loop->run();
    }

    public function getCommands()
    {
        return $this->commands;
    }

    protected function addDefaultCommands()
    {
        $this->addCommand(\Knight23\Core\Command\ListCommands::class);
        $this->addCommand(\Knight23\Core\Command\HelpCommand::class);
    }

    protected function getDefaultCommand()
    {
        return "list";
    }
}
