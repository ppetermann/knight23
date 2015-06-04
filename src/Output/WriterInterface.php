<?php
namespace Knight23\Core\Output;

interface WriterInterface
{
    /**
     * @param string $line
     *
     * @return void
     */
    public function writeln($line);

    /**
     * @return void
     */
    public function write($characters);
}
