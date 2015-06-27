<?php
namespace Knight23\Core\Command;

use Humbug\SelfUpdate\Updater;
use Knight23\Core\Banner\BannerInterface;
use Knight23\Core\Command\BaseCommand;
use Knight23\Core\Output\WriterInterface;
use Knight23\Core\RunnerInterface;

class SelfUpdateCommand extends BaseCommand
{
    /**
     * @var WriterInterface
     */
    private $output;

    /**
     * @var BannerInterface
     */
    private $banner;
    /**
     * @var RunnerInterface
     */
    private $runner;

    /**
     * @param WriterInterface $output
     * @param BannerInterface $banner
     * @param RunnerInterface $runner
     */
    public function __construct(WriterInterface $output, BannerInterface $banner, RunnerInterface $runner)
    {
        $this->setName("self-update");
        $this->setShort("update with latest release");

        $this->output = $output;
        $this->banner = $banner;
        $this->runner = $runner;
    }

    /**
     * @param array $options
     * @param array $arguments
     * @return void
     */
    public function run(array $options, array $arguments)
    {
        $this->output->writeln($this->banner->getBanner());
        $this->output->writeln('');

        $updater = new Updater(null, false);
        $updater->setStrategy(Updater::STRATEGY_GITHUB);
        $updater->getStrategy()->setPackageName($this->runner->getPackageName());
        $updater->getStrategy()->setPharName($this->runner->getPharName());
        $updater->getStrategy()->setCurrentLocalVersion($this->runner->getVersion());

        try {
            if ($updater->update()) {
                $this->output->writeln("updated to <info>" . $updater->getNewVersion() . "</info>");
            } else {
                $this->output->writeln("no update available");
            }
            exit(0);
        } catch (\Exception $e) {
            $this->output->write("<error>".$e->getMessage()."</error>");
            exit(1);
        }
    }
}
