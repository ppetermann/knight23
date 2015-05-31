<?php
namespace Knight23\Core\Output;

interface WriterInterface
{
    public function writeln($line);
    public function write($characters);
}
