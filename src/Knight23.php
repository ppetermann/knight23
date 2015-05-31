<?php
namespace Knight23\Core;

use Knight23\Core\Output\WriterInterface;
use React\EventLoop\LoopInterface;

class Knight23
{
    /**
     * @var WriterInterface
     */
    protected $output;

    /**
     * @var LoopInterface
     */
    protected $loop;

    public function __construct(WriterInterface $output, LoopInterface $loop)
    {
        $this->output = $output;
        $this->loop = $loop;
    }

    public function helloWorld()
    {
        $this->output->writeln('foobar');
    }

    public function run()
    {
        $this->helloWorld();
    }
}
