<?php


namespace Orsys\Logger;

use Orsys\Writer\WriterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    protected $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function log($level, $message, array $context = array())
    {
        $now = date('Y-m-d');
        $this->writer->write("[$level] $now - $message\n");
    }
}