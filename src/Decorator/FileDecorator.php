<?php

namespace MariaS431\Lr\Decorator;

use SplFileObject;
use Stringable;

abstract class FileDecorator implements Stringable {

    public function __construct(protected SplFileObject $file)
    {
    }

    public function fread() {}
    public function fwrite($text){}
}