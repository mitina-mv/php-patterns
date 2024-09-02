<?php

namespace MariaS431\Lr\Builder\Builders;

use MariaS431\Lr\Builder\Parts\Additional;
use MariaS431\Lr\Builder\Parts\Base;
use MariaS431\Lr\Builder\Parts\Drink;
use MariaS431\Lr\Builder\Standart;

class StandartBuilder implements BreakfastBuilder
{
    private Standart $breakfast;

    public function createBreakfast() : void
    {
        $this->breakfast = new Standart();
    }
    
    public function addBase() : void
    {
        $this->breakfast->setPart('base-1', new Base('каша'));
        $this->breakfast->setPart('base-2', new Base('яйцо вареное'));
    }
    
    public function addDrink() : void
    {
        $this->breakfast->setPart('drink-1', new Drink('кофе с молоком'));
    }
    public function addAddition() : void
    {
        $this->breakfast->setPart('add-1', new Additional('тост'));
        $this->breakfast->setPart('add-2', new Additional('ореховое масло'));
        $this->breakfast->setPart('add-3', new Additional('ягодный джем'));
    }
    
    public function getBreakfast() : Standart
    {
        return $this->breakfast;
    }
}