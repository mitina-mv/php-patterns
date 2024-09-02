<?php

namespace MariaS431\Lr\Builder;

abstract class Breakfast
{
    public array $structure;
    
    final public function setPart(string $key, object $value)
    {
        $this->structure[$key] = $value;
    }
}