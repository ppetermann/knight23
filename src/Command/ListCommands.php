<?php
namespace Knight23\Core\Command;

use Knight23\Core\Banner\BannerInterface;
use Knight23\Core\Colors\Colors;
use Knight23\Core\Output\WriterInterface;
use Knight23\Core\RunnerInterface;

class ListCommands extends BaseCommand implements CommandInterface
{

    /**
     * @var WriterInterface
     */
    protected $output;

    /**
     * @var RunnerInterface
     */
    protected $knight;

    /**
     * @var BannerInterface
     */
    protected $banner;

    /**
     * @param WriterInterface $output
     * @param RunnerInterface $knight
     * @param BannerInterface $banner
     */
    public function __construct(WriterInterface $output, RunnerInterface $knight, BannerInterface $banner)
    {
        $this->setName('help:list');
        $this->setShort('without param: show this help, with param: show help of command param');

        $this->output = $output;
        $this->knight = $knight;
        $this->banner = $banner;
    }

    public function run(array $options, array $arguments)
    {
        $this->output->writeln($this->banner->getBanner());

        $this->output->writeln("<header>Available Commands:</header>");
        /** @var CommandInterface $command */
        foreach ($this->knight->getCommands() as $command)
        {
            $this->output->writeln("    <highlight>".$command->getName() . "</highlight>");
        }
    }
}