<?php


namespace Orsys\Writer;


class FileWriter implements WriterInterface
{
    /** @var resource */
    protected $handle;

    public function __construct(string $filePath)
    {
        $this->handle = fopen($filePath, 'a');
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

    public function write(string $msg): void
    {
        fwrite($this->handle, $msg);
    }
}
