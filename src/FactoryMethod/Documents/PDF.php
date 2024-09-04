<?php

namespace MariaS431\Lr\FactoryMethod\Documents;

class PDF implements Document
{
    public function getText()
    {
        return 'Это содержимое pdf-документа';
    }
}
