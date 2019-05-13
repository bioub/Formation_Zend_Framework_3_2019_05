<?php


namespace Orsys\Writer;


interface WriterInterface
{
    public function write(string $msg): void;
}