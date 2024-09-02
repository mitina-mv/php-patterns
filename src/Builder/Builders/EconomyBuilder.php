<?php

namespace MariaS431\Lr\Builder\Builders;

use MariaS431\Lr\Builder\Economy;
use MariaS431\Lr\Builder\Parts\Additional;
use MariaS431\Lr\Builder\Parts\Base;
use MariaS431\Lr\Builder\Parts\Drink;

class EconomyBuilder implements BreakfastBuilder
{
    private Economy $breakfast;

    public function createBreakfast() : void
    {
        $this->breakfast = new Economy();
    }
    
    public function addBase() : void
    {
        $this->breakfast->setPart('base-1', new Base('каша'));
    }
    
    public function addDrink() : void
    {
        $this->breakfast->setPart('drink-1', new Drink('кофе'));
    }
    public function addAddition() : void
    {
        $this->breakfast->setPart('add-1', new Additional('тост'));
        $this->breakfast->setPart('add-2', new Additional('ореховое масло'));
    }
    
    public function getBreakfast() : Economy
    {
        return $this->breakfast;
    }
}