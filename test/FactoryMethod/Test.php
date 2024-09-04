<?php

declare(strict_types=1);

namespace MariaS431\Test\FactoryMethod;

use MariaS431\Lr\FactoryMethod\ReaderPDF;
use MariaS431\Lr\FactoryMethod\ReaderWord;
use PHPUnit\Framework\TestCase;

class Test extends TestCase 
{
    public function testReadWord()
    {
        $reader = new ReaderWord();
        $this->assertEquals($reader->read(), 'Это содержимое word-документа');
    }

    public function testReadPDF()
    {
        $reader = new ReaderPDF();
        $this->assertEquals($reader->read(), 'Это содержимое pdf-документа');
    }
}
