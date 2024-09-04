<?php

namespace MariaS431\Lr\FactoryMethod;

use MariaS431\Lr\FactoryMethod\Documents\Document;

abstract class Reader
{
    abstract public function createDocument() : Document;

    public function read() : string
    {
        $doc = $this->createDocument();
        return $doc->getText();
    }
}
