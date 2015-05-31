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
    public function run()
    {
        $this->addDefaultCommands();
        // @todo place command parser here
        $run = "help:list";


        /** @var CommandInterface $command */
        foreach ($this->commands as $command) {
            if ($command->getShort() == $run)
            {
                $command->run([], []);
            }
        }

        // stuff
        $this->loop->run();
    }

    public function getCommands()
    {
        return $this->commands;
    }

    private function addDefaultCommands()
    {
        $this->addCommand(\Knight23\Core\Command\ListCommands::class);
    }
}
