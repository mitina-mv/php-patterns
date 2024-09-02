<?php

namespace MariaS431\Lr\Builder;

use MariaS431\Lr\Builder\Builders\BreakfastBuilder;

class Kitchener
{
    public function build(BreakfastBuilder $builder) : Breakfast
    {
        $builder->createBreakfast();
        $builder->addBase();
        $builder->addDrink();
        $builder->addAddition();

        return $builder->getBreakfast();
    }
}