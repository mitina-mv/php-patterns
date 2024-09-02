<?php

namespace MariaS431\Lr\Builder\Parts;

abstract class Part
{
    public function __construct(
        public string $name
    ) { 
    }
}
