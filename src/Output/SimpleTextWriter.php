<?php
namespace Knight23\Core\Output;

/**
 * Class SimpleTextWriter, for test & demonstration purposes,
 * use a proper writer for anything else
 *
 * @package Knight23\Core\Output
 */
class SimpleTextWriter implements WriterInterface
{

    /**
     * echoes $line plus eol character
     * @param $line
     */
    public function writeln($line)
    {
        $this->write($line.PHP_EOL);
    }

    /**
     * echoes $characters
     *
     * @param $characters
     */
    public function write($characters)
    {
        echo $characters;
    }
}
