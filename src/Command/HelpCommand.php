<?php
namespace Knight23\Core\Command;

use Knight23\Core\Banner\BannerInterface;
use Knight23\Core\Output\WriterInterface;
use Knight23\Core\RunnerInterface;

class HelpCommand extends BaseCommand implements CommandInterface
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
        $this->setName('help');
        $this->setShort('display help for a command');
        $this->addArgument('command', null, 'the command for which to display help');

        $this->output = $output;
        $this->knight = $knight;
        $this->banner = $banner;
    }

    public function run(array $options, array $arguments)
    {
        $this->output->writeln($this->banner->getBanner());

        if (count($arguments) < 1) {
            $this->output->writeln('<error>no argument, did you mean to run <highlight>list</highlight><error> instead?</error>');
            exit(1);
        }

        foreach ($this->knight->getCommands() as $command)
        {
            if($command->getName() == $arguments[0]) {
                $this->output->writeln('<highlight>' . $command->getName() .'</highlight> - ' . $command->getShort());
                $this->output->write($command->getHelp());
                break;
            }
        }
        exit(0);
    }
}
