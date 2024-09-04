<?php

namespace MariaS431\Lr\FactoryMethod;

use MariaS431\Lr\FactoryMethod\Documents\Document;
use MariaS431\Lr\FactoryMethod\Documents\PDF;

class ReaderPDF extends Reader
{
    public function createDocument() : Document
    {
        return new PDF();
    }
}
