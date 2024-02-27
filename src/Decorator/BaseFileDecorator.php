<?php

namespace MariaS431\Lr\Decorator;

use SplFileObject;

class BaseFileDecorator
{
    public function __construct(protected SplFileObject $file) { }

    public function current()
    {
        return $this->file->current();
    }

    public function fread($fileSize = 0)
    {
        return $this->file->fread($fileSize);
    }

    public function fwrite($text)
    {
        $this->file->fwrite($text);
    }

    public function fseek()
    {
        $this->file->fseek(0, SEEK_END);
    }

    public function rewind()
    {
        $this->file->rewind();
    }

    public function getSize()
    {
        return $this->file->getSize();
    }
}