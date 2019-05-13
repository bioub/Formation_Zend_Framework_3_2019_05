<?php


namespace Orsys\Writer;


class NullWriter implements WriterInterface
{

    public function write(string $msg): void
    {

    }
}