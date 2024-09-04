<?php

namespace MariaS431\Lr\FactoryMethod\Documents;

class Word implements Document
{
    public function getText()
    {
        return 'Это содержимое word-документа';
    }
}
